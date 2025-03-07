import React from 'react'
import type { Event } from '@models/events/events.model'

export interface EventListItemProps {
    event: Event
}

export const EventListItem = ({ event }: EventListItemProps) => {
    return (
        <div className="">
            { event.titel }
            { event.subtitel }
        </div>
    )
}