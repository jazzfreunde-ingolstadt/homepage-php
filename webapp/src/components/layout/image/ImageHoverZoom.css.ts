import { style } from "@vanilla-extract/css"

export const imageContainer = style({
    overflow: 'hidden',
})

export const image = style({
    width: '100%',
    height: '100%',
    objectFit: 'cover',
    objectPosition: 'center',
    transition: 'transform .5s ease',
    ':hover': {
        transform: 'scale(1.1)',
    },
})