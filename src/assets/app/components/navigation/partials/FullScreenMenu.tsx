import React from 'react'
import type { Link } from "models/navigation/link.model"
import MenuItem from './MainMenuItem'

export interface MainMenuProps {
    links: Link[]
    isFullScreenEnabled: boolean
    setToggleFullScreen: (isFullScreenEnabled: boolean) => void
}

export default ({ links, setToggleFullScreen }: MainMenuProps) => {
    return (
        <div className="fixed top-0 left-0 h-full w-full bg-blue flex flex-col justify-center">
            <button onClick={() => setToggleFullScreen(false)} className="absolute top-10 right-10 text-2xl">&times;</button>
            <ul className="flex flex-col content-start justify-center items-center text-lg">
                {links.map((link) =>
                    <MenuItem label={link.label} url={link.url} />
                )}
            </ul>
        </div>
    )
}