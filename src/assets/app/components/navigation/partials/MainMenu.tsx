import React from 'react'
import type { Link } from 'models/navigation/link.model'
import BarMenu from './BarMenu'
import FullScreenMenu from './FullScreenMenu'

export interface MainMenuProps {
    links: Link[]
    usesFullscreenMenu: boolean
    isFullScreenEnabled: boolean
    setToggleFullScreen: (isFullScreenEnabled: boolean) => void
}

export default ({
    links,
    isFullScreenEnabled,
    setToggleFullScreen,
    usesFullscreenMenu
}: MainMenuProps) => {
    if (usesFullscreenMenu) {
        if (!isFullScreenEnabled)
            return

        return <FullScreenMenu
            links={links}
            isFullScreenEnabled={isFullScreenEnabled}
            setToggleFullScreen={setToggleFullScreen}
        />
    }

    return <BarMenu links={links} />
}