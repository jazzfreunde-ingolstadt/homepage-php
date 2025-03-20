import { useQuery } from '@tanstack/react-query'
import { client } from '@services/jazzfreunde-api.service'
import { authenticatedRequest, type ApiRequest } from '@api/utils/request.util'
import type { Event } from '@models/events/events.model'
import type { HTTPError } from 'ky'
import type { EventCollection, Month } from '../models/events-collection.model'

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

export const groupEventsByMonth = (events: Event[]) => {
  const groupedEvents = events.reduce((acc, event) => {
    const month = new Date(event.start).toLocaleString('de-DE', { month: 'long' })
    if (!acc[month]) {
      acc[month] = []
    }
    acc[month].push(event)
    return acc
  }, {} as Record<string, Event[]>)

  return Object.entries(groupedEvents).map(([month, events]) => ({
    month: month as Month,
    events,
  } satisfies EventCollection))
}