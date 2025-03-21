import React from 'react'
import type { Link } from "@models/navigation/link.model"
import MenuItem from './MainMenuItem'

export interface MainMenuProps {
    /**
     * The links to be displayed in the menu.
     */
    links: Link[],
}

export default ({ links }: MainMenuProps) => {
    return (
    <ul role="menubar" className="flex flex-row content-start justify-center items-center gap-5 text-lg">
        {links.map((link) =>
            <MenuItem label={link.label} url={link.url} />
        )}
    </ul>
)}