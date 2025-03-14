import React from 'react'
import EventList from './partials/EventList'
import { useUpcommingEvents } from '@hooks/events/useEvents.hook'

export const EventsCalendar = () => {
    const {
        events,
        isLoading,
        error,
      } = useUpcommingEvents();

    return (
        <div>
            {isLoading && <div className="text-center">Loading...</div>}
            {error && <div className="text-center">Error: {error.message}</div>}
            {!isLoading && !error && <EventList events={events} />}
        </div>
    )
}