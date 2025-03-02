import React, { useState } from 'react'
import type { Link } from 'models/navigation/link.model'
import MainMenu from './partials/MainMenu'
import { Logo, type LogoProps } from './partials/Logo'
import { Burger } from './partials/Burger'

export interface MenuProps {
    links: Link[],
    logo: LogoProps
}

export const Menu = ({ links, logo }: MenuProps) => {
    const [isFullScreenEnabled, setToggleFullScreen] = useState(false)

    return (
        <nav role="menu" className="flex flex-row items-center duration-700">
            <Logo {...logo} />
            <MainMenu
                links={links}
                isFullScreenEnabled={isFullScreenEnabled}
                setToggleFullScreen={setToggleFullScreen}
            />
            <button onClick={() => setToggleFullScreen(true)}>
                <Burger />
            </button>
        </nav>
    )
}