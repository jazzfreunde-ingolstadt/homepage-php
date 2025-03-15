import React from 'react'
import type { Event } from '@models/events/events.model'
import { DateDisplay } from '@components/typography/datetine/DateDisplat'
import { TimeDisplay } from '@components/typography/datetine/TimeDisplay'


export interface EventListItemProps {
    /**
     * The event to display
     */
    event: Event
}

/**
 * Renders a single event in the event list
 * @param event The event to display
 * @returns A single event
 */
export const EventListItem = ({ event }: EventListItemProps) => {
    const category = event.category === 'none'
        ? null
        : (() => {
            switch (event.category) {
                case 'session': return 'Session'
                case 'jazztage': return 'Ingolstädter Jazztage'
                default: return null
            }
        })()

    return (
        <div className="flex flex-col lg:flex-row gap-6 w-full lg:h-36">
            <div className="flex flex-row flex-wrap lg:flex-nowrap lg:flex-col lg:w-40 gap-2 items-end text-center">
                <hr className="w-full border-blue border-2" />
                <span className="font-bold"><DateDisplay date={new Date(event.start)} /></span>
                <TimeDisplay date={new Date(event.start)} />
                <span className="ml-auto lg:ml-0 mt-0 lg:mt-auto">{event.location.name}</span>
            </div>
            <div className="flex flex-col">
                <div className="text-lg font-bold">{event.title}</div>
                <div>{event.subtitle}</div>
                {event.link && (
                    <div className="text-sm">{event.link}</div>
                )} 
                {category && (
                    <div className="mt-auto">{category}</div>
                )}
            </div>
        </div>
    )
}