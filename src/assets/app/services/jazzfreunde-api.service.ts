import type { JazzfreundeApi } from "@models/api/jazzfreunde-api.model"
import { createApiClient } from "@api/utils/request.util"

/**
 * Thin wrapper used to access the backend APIs with type-safety.
 *
 * @param params.fetcher The (authenticated) request function used to fetch the data from the API
 * @param params.path The request's endpoint path
 * @param params.method The request's HTTP method
 * @returns The parsed response body
 */
export const client = createApiClient<JazzfreundeApi>('http://localhost')