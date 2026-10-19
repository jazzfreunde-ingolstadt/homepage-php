import React from 'react'
import type { Event } from '@models/events/events.model'
import { TimeAndLocationInfo } from './TimeAndLocationInfo'
import { CategoryBadge } from './CategoryBadge'

export interface EventListItemProps {
    /**
     * The event to display
     */
    event: Event
     isSubscribed: boolean
     onNotify: (event: Event) => void
}

/**
 * Renders a single event in the event list
 * @param event The event to display
 * @returns A single event
 */
export const EventListItem = ({ event, isSubscribed, onNotify }: EventListItemProps) => {
    return (
        <div className="flex flex-col lg:flex-row gap-4 lg:gap-12 w-full min-h-[12em] py-4 border-b lg:border-0 border-grey-light">
            <div className="w-full lg:w-60 border-blue border-t-4">
                <TimeAndLocationInfo start={new Date(event.start)} end={new Date(event.end)} location={event.location} />
            </div>
            <div className="flex flex-col w-full justify-between">
                <div className="text-lg lg:text-xl font-bold tracking-wider">{event.title.toLocaleUpperCase()}</div>
                <div className="flex w-full flex-row items-center justify-start gap-2">
                    <CategoryBadge category={event.category} />
                    <button
                        type="button"
                        className="ml-auto flex w-fit flex-none items-center gap-2 whitespace-nowrap bg-orange px-4 py-2 font-bold text-white hover:bg-yellow rounded focus:outline-none focus:shadow-outline"
                        onClick={() => onNotify(event)}
                    >
                        <i
                            className={`${isSubscribed ? 'fa-solid' : 'fa-regular'} fa-bookmark`}
                            aria-hidden="true"
                        ></i>
                        Benachrichtige mich
                    </button>
                </div>
                <div>{event.subtitle}</div>
                {event.link && (<a href={event.link} target="_blank" rel="noopener noreferrer"><i className="fa-solid fa-link" aria-hidden="true"></i> Zur Webseite</a>)}
            </div>
        </div>
    )
}