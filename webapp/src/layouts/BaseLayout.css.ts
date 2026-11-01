import { style } from '@vanilla-extract/css'
import { sprinkles } from '@michemayer/vanilla-extract-styles'

export const wrapper = sprinkles({
    display: 'flex',
    flexDirection: 'column',
})

export const defaultTheme = sprinkles({
    fontFamily: 'primary',
    backgroundColor: 'secondaryLight',
    color: 'textDefault',
    minHeight: 'screen',
})

export const stretchContent = style({
    flexGrow: 1,
})