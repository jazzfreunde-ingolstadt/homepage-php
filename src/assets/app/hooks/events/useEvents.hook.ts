import { useQuery } from '@tanstack/react-query'
import { client } from '@services/jazzfreunde-api.service'
import { authenticatedRequest, type ApiRequest } from '@api/utils/request.util'
import type { Event } from '@models/events/events.model'
import type { HTTPError } from 'ky'

/**
 * Gets all heating points.
 *
 * @param fetcher The authenticated request
 * @returns An object containing the events
 */
export const getEvents = (fetcher: ApiRequest ) =>
  client({
    fetcher,
    path: '/api/events',
    method: 'get',
  })

/**
 * Fetches events.
 * @param params The request parameters
 */
export const useUpcommingEvents = () => {
  const { isLoading, error, data } = useQuery<Event[], HTTPError>({
    queryKey: [process.env.REACT_APP_QUERY_KEY, 'events'],
    queryFn: () => getEvents(authenticatedRequest)({
      "start[after]": new Date().toISOString(),
    }),
  })

  return {
    error,
    isLoading,
    events: data,
  }
}