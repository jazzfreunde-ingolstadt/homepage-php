import React from 'react'

interface TimeDisplayProps {
    date: Date
}

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