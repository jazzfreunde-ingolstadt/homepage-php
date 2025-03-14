import React from 'react'
import type { Link } from "@models/navigation/link.model"
import MenuItem from './MainMenuItem'

export interface MainMenuProps {
    /**
     * The links to be displayed in the menu.
     */
    links: Link[]
    /**
     * Whether the fullscreen menu is enabled.
     */
    isFullScreenEnabled: boolean
    /**
     * hook to set state of full screen menu.
     */
    setToggleFullScreen: (isFullScreenEnabled: boolean) => void
}

export default ({ links, setToggleFullScreen }: MainMenuProps) => {
    return (
        <div className="fixed top-0 left-0 h-full w-full bg-blue flex flex-col justify-center">
            <button onClick={() => setToggleFullScreen(false)} className="absolute top-10 right-10 text-3xl">&times;</button>
            <ul className="flex flex-col content-start justify-center items-center text-xl">
                {links.map((link) =>
                    <MenuItem label={link.label} url={link.url} />
                )}
            </ul>
        </div>
    )
}