import React from 'react'
import type { Event } from '@models/events/events.model'
import { TimeAndLocationInfo } from './TimeAndLocationInfo'
import { CategoryBadge } from './CategoryBadge'


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
    return (
        <div className="flex flex-col lg:flex-row gap-4 lg:gap-12 w-full min-h-[12em] py-4 border-b lg:border-0 border-grey-light">
            <div className="w-full lg:w-56 border-blue border-t-4">
                <TimeAndLocationInfo start={new Date(event.start)} end={new Date(event.end)} location={event.location} />
            </div>
            <div className="flex flex-col w-full justify-between">
                <div className="text-lg lg:text-xl font-bold tracking-wider">{event.title.toLocaleUpperCase()}</div>
                <div>{event.subtitle}</div>
                <CategoryBadge category={event.category} />
            </div>
        </div>
    )
}