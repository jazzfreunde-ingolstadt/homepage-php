import { style } from '@vanilla-extract/css'
import { sprinkles } from '@styles'

export const wrapper = style([
    {
        display: 'relative',
    },
    sprinkles({
        fontFamily: 'primary',
        backgroundColor: 'primaryOneDefault',
        color: 'textDefault',
    })
])

export const header = style([
    {
        position: 'sticky',
        top: 0,
        zIndex: 2,
    }, sprinkles({
        boxShadow: 'md',

    }),
])
