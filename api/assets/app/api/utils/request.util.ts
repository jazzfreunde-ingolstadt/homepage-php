import type { Options, Input, NormalizedOptions } from 'ky'
import ky, { HTTPError } from 'ky'

/** http methods used in ky.Options */
export type HttpMethod = 'get' | 'post' | 'put' | 'patch' | 'head' | 'delete'

/** Used to check whether the schema contains a (JSON) request body. */
export interface WithRequestBody {
  requestBody: { content: { 'application/json': object } }
}

/**
 * Wrapped `fetch` function which automatically adds the authorization header
 * (JSON Web Token/bearer token) and response/error handling to all requests.
 * JSON response payloads are parsed automatically.
 */
export type ApiRequest = <T = Response>(
  input: Input,
  init?: Options & {
    token?: string
  }
) => Promise<T>

/**
 * Checks wether the given key is a valid key of the given params.
 *
 * @param key The key to check
 * @param params The params to check against
 */
const isValidKey = <Params extends object>(
  key: string,
  params: Params
): key is keyof Params & string => typeof key === 'string' && key in params

/**
 * Checks whether the given param value is a valid path parameter value (of type
 * string, number or boolean), which can be serialized using encodeURIComponent.
 *
 * @param param The param to check
 */
const isValidPathParam = (param: unknown): param is string | number | boolean =>
  typeof param === 'string' ||
  typeof param === 'number' ||
  typeof param === 'boolean'

/**
 * Factory used to create a type-safe request function based on the paths,
 * params and data types defined in the API specification.
 *
 * @param baseUrl The API's basic URL without any resource paths attached
 * @returns A function to access the API in a type-safe manner
 * ```
 */
export const createApiClient =
  <Mapping>(baseUrl: string) =>
    <
      Path extends keyof Mapping & string,
      Method extends keyof Mapping[Path],
      Schema extends Mapping[Path][Method],
      RequestParams extends Schema extends {
        parameters: Partial<
          Record<
            'path' | 'query',
            Record<string, string | number | boolean | string[]>
          >
        >
      }
      ? Schema['parameters']
      : never,
      Params extends RequestParams extends
      | { path: object; query: object }
      | { path: object; query?: object }
      ? // Require the configured path + search params to be specified
      RequestParams['path'] & RequestParams['query']
      : RequestParams extends { path: object }
      ? // Require the configured path params to be specified (if required by spec)
      RequestParams['path']
      : RequestParams extends { query: object } | { query?: object }
      ? // Require the configured search params to be specified (if required by spec)
      RequestParams['query']
      : never,
      Body extends Schema extends WithRequestBody
      ? Schema['requestBody']['content']['application/json']
      : never,
      Res extends Schema extends {
        responses: { 200: { content: { 'application/json': unknown } } }
      }
      ? Schema['responses'][200]['content']['application/json']
      : Response,
      Resolver extends Schema extends { parameters: object }
      ? Schema extends
      | { parameters: { path: object } }
      | { parameters: { query: object } }
      ? Schema extends WithRequestBody
      ? (params: Params, init: Options & { json: Body }) => Promise<Res>
      : (params: Params, init?: Options) => Promise<Res>
      : Schema extends WithRequestBody
      ? (params: Params, init: Options & { json: Body }) => Promise<Res>
      : (params?: Params, init?: Options) => Promise<Res>
      : Schema extends WithRequestBody
      ? (params: undefined, init: Options & { json: Body }) => Promise<Res>
      : (params?: undefined, init?: Options) => Promise<Res>,
    >({
      fetcher,
      path,
      method,
    }: {
      fetcher: ApiRequest
      path: Path
      method: Method extends HttpMethod ? Method : never
    }) =>
      ((params?: Params, init?: Options) => {
        // Consider all params to be `searchParams`, if the `path` doesn't contain
        // any variables
        if (!path.includes('{')) {
          return fetcher<Res>(`${baseUrl}${path}`, {
            searchParams: (params ?? {}) as Record<string, string>,
            method,
            ...init,
          })
        }

        if (typeof params !== 'object' || params === null) {
          throw new Error('Please provide the required params')
        }

        // Extract all variables from the `path` - what's left in `params` (w/o a
        // matching variable) is considered to be a `searchParam`
        const pathParams = Array.from(path.matchAll(/\{([^}]*)\}/g)).map(
          ([, key]) => key
        )
        const searchParams = Object.fromEntries(
          Object.entries(params ?? {}).filter(
            ([key]) => !pathParams.includes(key)
          )
        )

        // Replace all variables in the `path` with the respective param value
        const hydratedPath = pathParams.reduce((acc, key) => {
          if (!isValidKey(key, params)) {
            throw new Error(`Cannot find required path param ${key}`)
          }

          const param = params[key]

          if (!isValidPathParam(param)) {
            throw new Error(
              `Cannot find valid param value for path param ${key} (${typeof param})`
            )
          }

          return acc.replace(`{${key}}`, encodeURIComponent(param))
        }, path)

        return fetcher<Res>(`${baseUrl}${hydratedPath}`, {
          searchParams: searchParams as Record<string, string>,
          method,
          ...init,
        })
      }) as Resolver

/**
 * Custom HTTPError that includes a parsed response body. Additionally, it also
 * includes details of the error (e.g., validation errors) as `errors` if
 * provided within the response body.
 */
export class HTTPCustomError<
  Errors = Record<string, string[] | string>,
> extends HTTPError {
  parsedResponseBody: Record<string, unknown> & {
    /** The errors within the parsed response, if available. */
    errors?: Errors
  }

  /** Gets the errors from the parsed response body. */
  get errors() {
    if ('errors' in this.parsedResponseBody) {
      return this.parsedResponseBody.errors
    }

    return undefined
  }

  constructor(
    response: Response,
    request: Request,
    options: NormalizedOptions,
    parsedResponseBody: Record<string, unknown>
  ) {
    super(response, request, options)
    this.name = 'HTTPCustomError'
    this.parsedResponseBody = parsedResponseBody
  }
}

/**
 * Wrapped `fetch` function which automatically adds the authorization header
 * (JSON Web Token/bearer token) if the user is authenticated and response/error
 * handling to all requests. JSON response payloads are parsed automatically.
 *
 * @param input The URL/Request to fetch
 * @param init Initialization options
 */
export const authenticatedRequest: ApiRequest = async <T = Response>(
  input: Input,
  init?: Options & {
    /**
     * Optional access token to use for the request. If not provided, the token
     * will be fetched automatically. Mostly used during testing.
     */
    token?: string
  }
) => {
  const token =
    init?.token

  const api = ky.extend({
    retry: 0,
    hooks: {
      ...(token && {
        beforeRequest: [
          (request) => {
            request.headers.set('authorization', `Bearer ${token}`)
          },
        ],
      }),
      beforeError: [
        async (err) => {
          const { response, request, options } = err

          if (
            !response.headers
              .get('content-type')
              ?.match(/application\/(?:json|problem\+json)/g)
          ) {
            return err
          }

          const parsedResponseBody = await response.json().catch(() => {
            console.error('Error response could not be parsed.', err.response)
            return {} as Record<string, unknown>
          })

          return new HTTPCustomError(
            response,
            request,
            options,
            parsedResponseBody as Record<string, unknown>
          )
        },
      ],
    },
  })

  const response = await api(input, init)

  if (
    response.status === 204 ||
    !response.headers.get('content-type')?.startsWith('application/json')
  ) {
    return response as T
  }

  const body = await response.json()

  return body as T
}