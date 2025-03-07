import React from 'react'
import { EventsCalendar } from "@components/events/EventsCalendar"
import { Providers } from '@components/providers/Providers'

export default () => {
    return (
        <Providers>
            <EventsCalendar />
        </Providers>
    )
}