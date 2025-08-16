import React from 'react'
import EventList from './partials/EventList'
import { groupEventsByMonth, useUpcommingEvents } from '@components/events/hooks/events-hooks'
import { MessageBox } from '@components/layout/message-box'

/**
 * Renders the event calendar
 * It displays a list of events
 */
export const EventsCalendar = () => {
    const {
        events,
        isLoading,
        error,
    } = useUpcommingEvents()

    if (isLoading)
        return <div className="text-center">Suche nach Veranstaltungen...</div>

    var eventsByMonth = groupEventsByMonth(events ?? [])

    return (
        <div className="flex flex-col gap-5 w-full">
            {error && <MessageBox>Fehler beim Laden der Veranstaltungen</MessageBox>}
            {eventsByMonth.length === 0 && !error && (
                <MessageBox>Keine Veranstaltungen gefunden</MessageBox>
            )}

            {eventsByMonth.map(eventCollection => (
                <div key={eventCollection.month} className="flex flex-col gap-5">
                    <div className="sticky top-0 py-2 bg-white border-b border-grey-light">
                        <h3 className="text-xl lg:text-4xl font-bold tracking-wider">{eventCollection.month.toLocaleUpperCase()}</h3>
                    </div>
                    <EventList events={eventCollection.events} />
                </div>
            ))}
        </div>
    )
}