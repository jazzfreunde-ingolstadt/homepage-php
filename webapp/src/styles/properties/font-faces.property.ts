export type FontFace = {
    fontFamily: FontFamily
    src: string
    fontWeight: string
    fontStyle: string
    preload?: boolean
}

export type FontFamily = 'FF DIN'

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
