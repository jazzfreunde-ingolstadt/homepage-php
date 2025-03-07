import React from 'react'
import type { Event } from '@models/events/events.model'
import { EventListItem } from './EventListItem'

export interface EventListProps {
    events: Event[] | undefined
}

export default ({ events }: EventListProps) => {
    events ??= []
    return (
        <div className="flex flex-col gap-5">
            {events.map(event => <EventListItem event={event} />)}
        </div>
    )
}