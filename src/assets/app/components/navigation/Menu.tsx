import React, { useEffect, useState } from 'react'
import type { Link } from '@models/navigation/link.model'
import useSize from '@hooks/window/useSize'
import MainMenu from './partials/MainMenu'
import { Logo, type LogoProps } from './partials/Logo'
import { Burger } from './partials/Burger'

export interface MenuProps {
    links: Link[],
    logo: LogoProps
}

export const Menu = ({ links, logo }: MenuProps) => {
    const [isFullScreenEnabled, setToggleFullScreen] = useState(false)
    const windowsize = useSize()
    const usesFullscreenMenu = windowsize[0] < 1024

    return (
        <nav role="menu" className="flex flex-row items-center justify-between duration-700">
            <Logo {...logo} />
            <MainMenu
                links={links}
                usesFullscreenMenu={usesFullscreenMenu}
                isFullScreenEnabled={isFullScreenEnabled}
                setToggleFullScreen={setToggleFullScreen}
            />
            {usesFullscreenMenu &&
                <button onClick={() => setToggleFullScreen(true)}>
                    <Burger />
                </button>
            }
        </nav>
    )
}