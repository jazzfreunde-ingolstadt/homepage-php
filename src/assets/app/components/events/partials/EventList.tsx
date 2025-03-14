import React from 'react'
import type { Event } from '@models/events/events.model'
import { EventListItem } from './EventListItem'

export interface EventListProps {
    /**
     * The events to display
     */
    events: Event[] | undefined
}

/**
 * Renders a list of events
 * @param events The events to display
 * @returns A list of events
 */
export default ({ events }: EventListProps) => {
    events ??= []

    if (events.length === 0) {
        return (
            <div className="flex flex-col justify-center w-full">
                <p className="text-xl">Keine Veranstaltungen gefunden</p>
            </div>
        )
    }

    return (
        <div className="flex flex-col gap-5 w-full">
            {events.map(event => <EventListItem event={event} />)}
        </div>
    )
}