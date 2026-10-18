import { style } from '@vanilla-extract/css'
import { sprinkles } from '@michemayer/vanilla-extract-styles'

export const wrapper = style([
    {
        display: 'flex',
        flexDirection: 'column',
    },
    sprinkles({
        fontFamily: 'primary',
        backgroundColor: 'secondaryLight',
        color: 'textDefault',
        minHeight: 'screen',
    })
])

export const stretchContent = style({
    flexGrow: 1,
})