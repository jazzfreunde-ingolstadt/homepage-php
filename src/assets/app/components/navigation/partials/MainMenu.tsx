import React from 'react'
import type { Link } from 'models/navigation/link.model'
import useSize from '@hooks/useSize'
import BarMenu from './BarMenu'
import FullScreenMenu from './FullScreenMenu'

export interface MainMenuProps {
    links: Link[]
    isFullScreenEnabled: boolean
    setToggleFullScreen: (isFullScreenEnabled: boolean) => void
}

export default ({ links, isFullScreenEnabled, setToggleFullScreen }: MainMenuProps) => {
    const windowsize = useSize()
    var minize = windowsize[0] < 1024

    if (minize) {
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