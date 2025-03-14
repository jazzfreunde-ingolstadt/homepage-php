import React from 'react'

interface TimeDisplayProps {
    /**
     * The date to be displayed.
     */
    date: Date
}

/**
 * Renders a time in two formats: short and long.
 * The short format is displayed on mobile devices, while the long format is displayed on larger screens.
 */
export const TimeDisplay = ({ date }: TimeDisplayProps) => {
    const displayMinutes = date.getMinutes() === 0 ? undefined : '2-digit'

    return (
        <time dateTime={date.toISOString()}>
            {
                new Date(date).toLocaleTimeString('de-de', {
                    hour: '2-digit',
                    minute: displayMinutes
                })
            }
            {displayMinutes && ' Uhr'}
        </time>
    )
}