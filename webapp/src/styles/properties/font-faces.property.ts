export type FontFace = {
    fontFamily: FontFamily
    src: string
    fontWeight: string
    fontStyle: string
    preload?: boolean
}

export type FontFamily = 'Bookman Old Style' | 'Harlow Solid'

/**
 * Object with all available font-faces and their metadata
 */
export const fontFaces: FontFace[] = [
    {
        fontFamily: 'Bookman Old Style',
        src: '/fonts/bookman_old_style/bookman_old_style.ttf',
        fontWeight: 'normal',
        fontStyle: 'normal',
        preload: true,
    },
    {
        fontFamily: 'Bookman Old Style',
        src: '/fonts/bookman_old_style/bookman_old_style-italic.ttf',
        fontWeight: 'normal',
        fontStyle: 'italic',
    },
    {
        fontFamily: 'Bookman Old Style',
        src: '/fonts/bookman_old_style/bookman_old_style-bold.ttf',
        fontWeight: 'bold',
        fontStyle: 'normal',
    },
    {
        fontFamily: 'Bookman Old Style',
        src: '/fonts/bookman_old_style/bookman_old_style-bold_italic.ttf',
        fontWeight: 'bold',
        fontStyle: 'italic',
    },
    {
        fontFamily: 'Harlow Solid',
        src: '/fonts/harlow/harlow-solid.ttf',
        fontWeight: 'normal',
        fontStyle: 'normal',
        preload: true,
    },
] as const
