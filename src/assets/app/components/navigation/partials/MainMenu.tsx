import React from 'react'
import type { Link } from '@models/navigation/link.model'
import BarMenu from './BarMenu'
import FullScreenMenu from './FullScreenMenu'

export interface MainMenuProps {
    /**
     * The links to be displayed in the menu.
     */
    links: Link[]
    /**
     * Whether the menu should be displayed in fullscreen or bar mode.
     */
    usesFullscreenMenu: boolean
    /**
     * Whether the fullscreen menu is enabled.
     */
    isFullScreenEnabled: boolean
    /**
     * Hook to set state of full screen menu.
     */
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