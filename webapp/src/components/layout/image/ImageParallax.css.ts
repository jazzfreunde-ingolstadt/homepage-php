import { style } from '@vanilla-extract/css'

export const wrapper = style({
    position: 'relative',
    width: 'auto',
    minHeight: '25vh',
})

export const fixedBackgroundContainer = style({
    position: 'absolute',
    top: 0,
    width: '100%',
    height: '100%',
    overflow: 'clip',
    zIndex: 0,
})

export const parallaxContainer = style({
    position: 'relative',
    '@supports': {
        '(overflow: clip)': {
            overflow: 'clip',
            width: '100%',
            height: '2000vh',
            marginTop: '-1000vh',
        }
    },
})

/*
* Versionen < 16  von Safari untersttützen kein overflow-clip.
* Um Overflow am Seitenende zu vermeiden wird die Containerhöhe in diesen Browser Versionen limitiert.
* Damit wird der Parallax-Effekt deaktiviert.
*/
export const fallbackContainer = style({
    height: '100%',
    overflow: 'hidden',
})

export const parallaxImage = style({
    position: 'sticky',
    top: 0,
    width: '100%',
    minHeight: '100vh',
    objectFit: 'cover',
})
