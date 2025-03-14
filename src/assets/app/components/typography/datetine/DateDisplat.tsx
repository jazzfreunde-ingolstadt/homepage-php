import React from 'react'

interface DateDisplayProps {
    date: Date
}

export const DateDisplay = ({ date }: DateDisplayProps) => {
    const shortDate = new Intl.DateTimeFormat('de-de', { weekday: 'short', day: 'numeric', month: 'short' }).format(date)
    const longDate = new Intl.DateTimeFormat('de-de', { weekday: 'long', day: 'numeric', month: 'long' }).format(date)

    return (
        <time dateTime={date.toISOString()} >
            <span className="block md:hidden">{shortDate}</span>
            <span className="hidden md:block">{longDate}</span>
        </time >
    )
}