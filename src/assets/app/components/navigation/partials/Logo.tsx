import React from 'react'
import type { Picture } from '@models/images/picture.model'

export interface LogoProps extends Picture {
}

/**
 * Renders the logo of the application.
 */
export const Logo = ({ src, alt, sources }: LogoProps) => {
    return (
        <div className="flex flex-row gap-2 m-10 items-center">
            <img className="h-12 w-12" src={src} alt={alt} />
            <h1 className="text-[.7em] font-bold text-white">
                Jazzfreunde<br /><span className="whitespace-nowrap">Ingolstadt e.V.</span>
            </h1>
        </div>
    )
}