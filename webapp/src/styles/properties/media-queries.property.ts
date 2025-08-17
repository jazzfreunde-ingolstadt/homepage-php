import { breakpoints } from '@styles/properties/breakpoints.property'
import type { Breakpoint } from '@styles/properties/breakpoints.property'

/** Object with mediaQueries corresponding to breakpoints */
export const mediaQueries = Object.entries(breakpoints)
    .filter(([key]) => key !== 'xs')
    .reduce(
        (acc, [key, value]) => ({
            ...acc,
            [key]: `screen and (min-width: ${value})`,
        }),
        {} as Record<Breakpoint, string>
    )