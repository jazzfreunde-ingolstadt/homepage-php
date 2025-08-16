import React from 'react'
import type { Link } from "@models/navigation/link.model"
import MenuItem from './MainMenuItem'
import { Logo, type LogoProps } from './Logo'

export interface MainMenuProps {
    /**
     * The logo to be displayed in the menu.
     */
    logo: LogoProps
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

export default ({ logo, links, setToggleFullScreen }: MainMenuProps) => {
    return (
        <div className="fixed top-0 left-0 h-full w-full bg-blue flex flex-col justify-center">
            <div className="absolute top-10 w-screen flex justify-center">
                <Logo {...logo} />
            </div>
            <button onClick={() => setToggleFullScreen(false)} className="absolute top-10 right-10 text-3xl">&times;</button>
            <ul role="menu" className="flex flex-col content-start justify-center items-center gap-4 text-xl">
                {links.map((link) =>
                    <MenuItem label={link.label} url={link.url} />
                )}
            </ul>
        </div>
    )
}