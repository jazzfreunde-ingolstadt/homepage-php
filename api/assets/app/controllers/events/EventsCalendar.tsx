import React from 'react'
import { EventsCalendar } from "@components/events/EventsCalendar"
import { Providers } from '@components/providers/Providers'

/**
 * Makes the event calendar component accessable via symfony-ux.
 */
export default () => {
    return (
        <Providers>
            <EventsCalendar />
        </Providers>
    )
}