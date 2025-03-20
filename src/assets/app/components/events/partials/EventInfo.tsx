import React from 'react'
import type { EventLocation } from '@models/events/events.model'

interface EventTimeProps {
    /**
     * Start of the event
     * @example 2023-10-01T12:00:00Z
     */
    start: Date
    /**
     * End of the event
     * @example 2023-10-01T12:00:00Z
     */
    end: Date

    /**
     * Location of the event
     */
    location?: EventLocation
}

/**
 * Renders the start and end time of an event
 */
export const EventInfo = ({ start, end, location }: EventTimeProps) => {
    const day = new Intl.DateTimeFormat('de-de', { day: '2-digit' }).format(start)
    const weekday = new Intl.DateTimeFormat('de-de', { weekday: 'long' }).format(start)
    const startTime = new Intl.DateTimeFormat('de-de', { hour: '2-digit', minute: '2-digit' }).format(start)
    const endTime = start.getTime() !== end.getTime() && new Intl.DateTimeFormat('de-de', { hour: '2-digit', minute: '2-digit' }).format(end)

    return (
        <div className="h-full flex flex-row lg:flex-col gap-6 lg:gap-0 justify-stretch align-strech tracking-wider">
            <time dateTime={start.toISOString()} className="flex flex-col" >
                <div className="flex flex-row gap-2">
                    <span className="block text-xl lg:text-3xl font-bold">{day}</span>
                    <span className="block text-base lg:text-xl lg:mt-1 uppercase">{weekday}</span>
                </div>
                <span className="block lg:text-lg mt-0 lg:mt-auto">{startTime}{endTime ? ` - ${endTime}` : ' Uhr'}</span>
            </time >
            {location && <span className="lg:mt-auto font-bold uppercase">{location.name}</span>}
        </div>
    )
}