import type { components, operations } from '@api/types/jazzfreunde-api.generated'

/** Event type */
export type Event = components['schemas']['Event']

/** Event type of a events category. */
export type EventCategory = components['schemas']['Event']['category']

/** Event type of a events location. */
export type EventLocation = components['schemas']['Event']['location']

/** Path params of a events request. */
export type EventsPathParams =
  operations['api_events_get_collection']['parameters']['path']

/** Query params of a events request. */
export type EventsQueryParams =
  operations['api_events_get_collection']['parameters']['query']

/** Request params of a events request. */
export type EventsParams = EventsPathParams & EventsQueryParams