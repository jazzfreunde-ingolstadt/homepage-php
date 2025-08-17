import { globalStyle, assignVars } from '@vanilla-extract/css'
import type { StyleRule } from '@vanilla-extract/css'
import { fontSizeContract } from '@styles/contracts/font-size.contract.css'
import {
  fontSizesFrom3Xl,
  fontSizesMdTo3Xl,
  fontSizesXsToSm,
} from '@styles/properties/font-sizes.property'
import type { Breakpoint } from '@styles/properties/breakpoints.property'
import { mediaQueries } from '@styles/properties/media-queries.property'

type CSSProps = Omit<StyleRule, '@media' | '@supports'>
type ResponsiveStyle = Partial<Record<Breakpoint, CSSProps>>

/**
 * Generates a media query for a given breakpoint
 *
 * @param breakpoint The breakpoint to generate the media query for
 * @returns The media query for the given breakpoint
 */
const makeMediaQuery =
  (breakpoint: Breakpoint) => (styles?: CSSProps) =>
    !styles || Object.keys(styles).length === 0
      ? {}
      : {
        [mediaQueries[breakpoint]]: styles,
      }

/**
 * Helper to generate responsive styles to be used within vanilla-extracts
 * style()-function. Use only, when styles can't be responsively generated
 * with the atoms()-utility.
 *
 * @param styles Object containing styles for specific breakpoint
 * @returns Style rule to be passed to vanilla-extracts style()-function
 */
export const responsiveStyle = (styles: ResponsiveStyle): StyleRule => ({
  ...styles.xs,
  ...(styles.sm ||
    styles.md ||
    styles.lg ||
    styles.xl ||
    styles['2xl'] ||
    styles['3xl']
    ? {
      '@media': {
        ...makeMediaQuery('sm')(styles.sm ?? {}),
        ...makeMediaQuery('md')(styles.md ?? {}),
        ...makeMediaQuery('lg')(styles.lg ?? {}),
        ...makeMediaQuery('xl')(styles.xl ?? {}),
        ...makeMediaQuery('2xl')(styles['2xl'] ?? {}),
        ...makeMediaQuery('3xl')(styles['3xl'] ?? {}),
      },
    }
    : {}),
})

/** Add responsive font sizes to :root */
globalStyle(
  ':root',
  responsiveStyle({
    xs: { vars: assignVars(fontSizeContract, fontSizesXsToSm) },
    md: { vars: assignVars(fontSizeContract, fontSizesMdTo3Xl) },
    '3xl': { vars: assignVars(fontSizeContract, fontSizesFrom3Xl) },
  })
)