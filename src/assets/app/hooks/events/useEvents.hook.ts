import { useQuery } from '@tanstack/react-query'
import { client } from '@services/jazzfreunde-api.service'
import { authenticatedRequest, type ApiRequest } from '@api/utils/request.util'
import type { Event, EventsParams } from '@models/events/events.model'
import type { HTTPError } from 'ky'
import { config } from 'config'

/**
 * Gets all heating points.
 *
 * @param fetcher The authenticated request
 * @returns An object containing the events
 */
export const getEvents = (fetcher: ApiRequest) =>
  client({
    fetcher,
    path: '/api/events',
    method: 'get',
  })

/**
 * Fetches events.
 * @param params The request parameters
 */
export const useEvents = (params?: EventsParams) => {
  const { isLoading, error, data } = useQuery<Event[], HTTPError>({
    queryKey: [config.queryKey, 'events', params],
    queryFn: () => getEvents(authenticatedRequest)(params),
    staleTime: config.staleTime
  })

  return {
    error,
    isLoading,
    events: data,
  }
}