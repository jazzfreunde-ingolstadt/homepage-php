import React, { useState } from 'react'
import type { Event } from '@models/events/events.model'
import { EventListItem } from './EventListItem'
import { EventNotificationSubscription } from './EventNotificationSubscription'

export interface EventListProps {
    /**
     * The events to display
     */
    events: Event[]
    notificationPrivacyUrl: string
}

/**
 * Renders a list of events
 * @param events The events to display
 * @returns A list of events
 */
export default ({ events, notificationPrivacyUrl }: EventListProps) => {
    const [notificationEvent, setNotificationEvent] = useState<Event | null>(null)
    const [subscribedEventIds, setSubscribedEventIds] = useState<Set<number>>(() => new Set())

    return (
        <div className="flex flex-col gap-10 w-full">
            {events.map(event => (
                <EventListItem
                    key={event.id}
                    event={event}
                    isSubscribed={subscribedEventIds.has(event.id)}
                    onNotify={setNotificationEvent}
                />
            ))}
            <EventNotificationSubscription
                eventId={notificationEvent?.id ?? null}
                expirationTime={notificationEvent?.end ?? null}
                isOpen={notificationEvent !== null}
                onClose={() => setNotificationEvent(null)}
                onSubscribed={eventId => setSubscribedEventIds(ids => new Set(ids).add(eventId))}
                notificationPrivacyUrl={notificationPrivacyUrl}
            />
        </div>
    )
}