
import type { Event } from '@models/events/events.model'

export type Month = 'Januar' | 'Februar' | 'März' | 'April' | 'Mai' | 'Juni' | 'Juli' | 'August' | 'September' | 'Oktober' | 'November' | 'Dezember'


export interface EventCollection {
    /**
     * month in which the events are taking place
     */
    month: Month
    /**
     * The events to display
     */
    events: Event[]
}