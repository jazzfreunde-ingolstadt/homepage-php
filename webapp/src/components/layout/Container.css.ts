import { sprinkles, vars } from '@styles'
import { style } from '@vanilla-extract/css'
import { recipe } from '@vanilla-extract/recipes'
import type { MaxWidth } from '@styles'

const containerStyles = sprinkles({
    width: 'auto',
    marginX: 'auto',
})

const containerMaxWidths = Object.entries(vars.maxWidths)
    .reduce(
        (widthDictionary, [key, value]) => ({
            ...widthDictionary,
            [key]: { maxWidth: value },
        }),
        {} as Record<MaxWidth, { maxWidth: string }>
    )

export const container = recipe({
    base: [
        containerStyles,
        style({
            overflow: 'hidden',
        })
    ],
    variants: {
        maxWidth: { ...containerMaxWidths },
    }
})