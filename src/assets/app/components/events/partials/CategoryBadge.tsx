import React from 'react'
import type { EventCategory } from '@models/events/events.model'

interface CategoryBadgeProps {
    /**
     * Category of the event
     */
    category: EventCategory
}

/**
 * Renders the category of the event
 */
export const CategoryBadge = ({ category }: CategoryBadgeProps) => {
    if (category === 'none') {
        return null
    }

    const name = (() => {
        switch (category) {
            case 'session': return 'Session'
            case 'jazztage': return 'Ingolstädter Jazztage'
            default: return null
        }
    })()

    return (
        <div className="flex flex-row gap-2 lg:gap-4 py-2">
            <div className="rounded-sm bg-grey-light text-orange px-1 text-xs lg:text-sm font-semibold">
                {name}
            </div>
        </div>
    )
}