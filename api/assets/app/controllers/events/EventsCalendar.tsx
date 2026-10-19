import React from 'react'
import { EventsCalendar, type EventsCalendarProps } from "@components/events/EventsCalendar"
import { Providers } from '@components/providers/Providers'

/**
 * Makes the event calendar component accessable via symfony-ux.
 */
export default ({ notificationPrivacyUrl }: EventsCalendarProps) => {
    return (
        <Providers>
            <EventsCalendar notificationPrivacyUrl={notificationPrivacyUrl} />
        </Providers>
    )
}