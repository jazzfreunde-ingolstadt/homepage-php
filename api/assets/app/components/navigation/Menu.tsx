import React, { useEffect, useState } from 'react'
import type { Link } from '@models/navigation/link.model'
import useSize from '@hooks/window/useSize'
import MainMenu from './partials/MainMenu'
import { Logo, type LogoProps } from './partials/Logo'
import { Burger } from './partials/Burger'

export interface MenuProps {
    /**
     * The link to the home page.
     */
    homeLink: Link,
    /**
     * The links to be displayed in the menu.
     */
    links: Link[],
    /**
     * The logo to be displayed in the menu.
     */
    logo: LogoProps
}

/**
 * Renders the main navigation component of the application.
 */
export const Menu = ({ homeLink, links, logo }: MenuProps) => {
    const [isFullScreenEnabled, setToggleFullScreen] = useState(false)
    const windowsize = useSize()
    const usesFullscreenMenu = windowsize[0] < 1024

    return (
        <nav role="navigation" className="flex flex-row items-center justify-between gap-5 duration-700">
            <a href={homeLink.url} title={homeLink.label}>
                <Logo {...logo} />
            </a>
            <MainMenu
                logo={logo}
                links={links}
                usesFullscreenMenu={usesFullscreenMenu}
                isFullScreenEnabled={isFullScreenEnabled}
                setToggleFullScreen={setToggleFullScreen}
            />
            {usesFullscreenMenu &&
                <button title="Open main menu" type="button" onClick={() => setToggleFullScreen(true)}>
                    <Burger />
                </button>
            }
        </nav>
    )
}