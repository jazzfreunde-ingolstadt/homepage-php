import React from 'react'

interface DateDisplayProps {
    /**
     * The date to be displayed.
     */
    date: Date
}

/**
 * Renders a date in two formats: short and long.
 * The short format is displayed on mobile devices, while the long format is displayed on larger screens.
 */
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