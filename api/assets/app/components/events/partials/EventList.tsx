import React from 'react'
import type { Event } from '@models/events/events.model'
import { EventListItem } from './EventListItem'

export interface EventListProps {
    /**
     * The events to display
     */
    events: Event[]
}

/**
 * Renders a list of events
 * @param events The events to display
 * @returns A list of events
 */
export default ({ events }: EventListProps) => {
    return (
        <div className="flex flex-col gap-10 w-full">
            {events.map(event => <EventListItem event={event} />)}
        </div>
    )
}