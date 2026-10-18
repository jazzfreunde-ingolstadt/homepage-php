import type { FontFace } from '@michemayer/vanilla-extract-styles'

export type FontFamily = 'FF DIN'

export const fontFamilies = {
    ffDin: 'FF DIN',
} as const satisfies Record<string, FontFamily>

/** 
 * Object with all available font-faces and their metadata
 */
export const fontFaces: FontFace[] = [
    {
        fontFamily: 'FF DIN',
        src: '/fonts/ffdin.ttf',
        fontWeight: 'lighter',
        fontStyle: 'normal',
        preload: true,
    },
    {
        fontFamily: 'FF DIN',
        src: '/fonts/ffdin-medium.ttf',
        fontWeight: 'normal',
        fontStyle: 'normal',
        preload: true,
    },
    {
        fontFamily: 'FF DIN',
        src: '/fonts/ffdin-bold.ttf',
        fontWeight: 'bold',
        fontStyle: 'normal',
        preload: true,
    },
] as const