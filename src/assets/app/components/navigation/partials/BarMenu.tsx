import React from 'react'
import type { Link } from "models/navigation/link.model"
import MenuItem from './MainMenuItem'

export interface MainMenuProps {
    links: Link[],
}

export default ({ links }: MainMenuProps) => {
    return (
    <ul className="flex flex-row content-start justify-center items-center">
        {links.map((link) =>
            <MenuItem label={link.label} url={link.url} />
        )}
    </ul>
)}