import { createSprinkles, defineProperties } from '@vanilla-extract/sprinkles'
import type { Breakpoint } from '@styles/properties/breakpoints.property'
import { breakpoints } from '@styles/properties/breakpoints.property'
import { vars } from '@styles/vars.css'

interface ResponsiveConditions {
  /** Breakpoints and their corresponding media queries */
  conditions: {
    [K in Breakpoint]: {
      /** The media query */
      '@media': string
    }
  };
  /** The default condition */
  defaultCondition: Extract<Breakpoint, 'xs'>
  /** Array of breakpoints */
  responsiveArray: Breakpoint[]
}

/**
 * Provides the base for all responsive properties build with sprinkles
 */
export const responsiveConditions: ResponsiveConditions = {
  conditions: {
    xs: {
      '@media': `screen and (min-width: ${breakpoints.xs})`,
    },
    sm: {
      '@media': `screen and (min-width: ${breakpoints.sm})`,
    },
    md: {
      '@media': `screen and (min-width: ${breakpoints.md})`,
    },
    lg: {
      '@media': `screen and (min-width: ${breakpoints.lg})`,
    },
    xl: {
      '@media': `screen and (min-width: ${breakpoints.xl})`,
    },
    '2xl': {
      '@media': `screen and (min-width: ${breakpoints['2xl']})`,
    },
    '3xl': {
      '@media': `screen and (min-width: ${breakpoints['3xl']})`,
    },
  },
  defaultCondition: 'xs',
  responsiveArray: ['xs', 'sm', 'md', 'lg', 'xl', '2xl', '3xl'],
}

/** Responsive properties provided to the "sprinkles"-utility function. */
export const responsiveProperties = defineProperties({
  ...responsiveConditions,
  properties: {
    /** Item alignment of a flex container. Can be set responsively. */
    alignItems: ['stretch', 'flex-start', 'center', 'flex-end', 'baseline'],
    /** CSS-Display property. Can be set responsively. */
    display: ['none', 'flex', 'block', 'inline', 'inline-flex'],
    /** Direction of a flex container. Can be set responsively. */
    flexDirection: ['row', 'column', 'row-reverse', 'column-reverse'],
    /** Wrapping behavior on a flex container. Can be set responsively. */
    flexWrap: ['nowrap', 'wrap', 'wrap-reverse'],
    /**
     * Font size of an element. Additionally sized, but handled via own media query
     *
     * @see `css/typography.css.ts
     */
    fontSize: { ...vars.typography.fontSizes, inherit: 'inherit' },
    /** Gap between flex elements (set x and y-axis equally). Can be set responsively. */
    gap: vars.spaces,
    /** Gap between flex elements in the y-axis. Can be set responsively. */
    rowGap: vars.spaces,
    /** Height of an element. Can be set responsively. */
    height: {
      full: '100%',
      auto: 'auto',
      screen: '100vh',
    },
    /** Mininum height of an element. Can be set responsivly */
    minHeight: {
      full: '100%',
      screen: '100vh',
    },
    /** Space distribution of a flex container. Can be set responsively. */
    justifyContent: [
      'center',
      'flex-end',
      'flex-start',
      'space-around',
      'space-between',
      'stretch',
    ],
    /** Margin bottom of an element. Can be set responsively. */
    marginBottom: vars.spaces,
    /** Margin left of an element. Can be set responsively. */
    marginLeft: vars.spaces,
    /** Margin right of an element. Can be set responsively. */
    marginRight: vars.spaces,
    /** Margin top of an element. Can be set responsively. */
    marginTop: vars.spaces,
    /** Maximal width an element can allocated. Can be set responsively. */
    maxWidth: vars.maxWidths,
    /** Padding bottom of an element. Can be set responsively. */
    paddingBottom: vars.spaces,
    /** Padding left of an element. Can be set responsively. */
    paddingLeft: vars.spaces,
    /** Padding right of an element. Can be set responsively. */
    paddingRight: vars.spaces,
    /** Padding top of an element. Can be set responsively. */
    paddingTop: vars.spaces,
    /** Positioning of an element. Can be set responsively. */
    position: ['absolute', 'relative', 'fixed'],
    /** Text alignment. Can be set responsively. */
    textAlign: ['left', 'center', 'right', 'justify'],
    /** Specifies how an <img> or <video> should be resized to fit its container */
    objectFit: ['cover', 'contain', 'fill', 'none', 'scale-down'],
    /** Width of an element. Can be set responsively. */
    width: {
      full: '100%',
      auto: 'auto',
    },
  },
  shorthands: {
    /** Shorthand for margin, sets all four sides equally. Can be set responsively. */
    margin: ['marginTop', 'marginBottom', 'marginLeft', 'marginRight'],
    /**
     * Shorthand for margin along the x axis, sets margin left and margin right.
     * Can be set responsively.
     */
    marginX: ['marginLeft', 'marginRight'],
    /**
     * Shorthand for margin along the y axis, sets margin top and margin bottom.
     * Can be set responsively.
     */
    marginY: ['marginTop', 'marginBottom'],
    /** Shorthand for padding, sets all four sides equally. Can be set responsively. */
    padding: ['paddingTop', 'paddingBottom', 'paddingLeft', 'paddingRight'],
    /**
     * Shorthand for padding along the x axis, sets margin left and margin right.
     * Can be set responsively.
     */
    paddingX: ['paddingLeft', 'paddingRight'],
    /**
     * Shorthand for padding along the y axis, sets margin top and margin bottom.
     * Can be set responsively.
     */
    paddingY: ['paddingTop', 'paddingBottom'],
  },
})

/** "Hoverable" properties provided to the "atoms"-utility function */
const hoverableProperties = defineProperties({
  conditions: {
    default: {},
    hover: { selector: '&:hover' },
  },
  defaultCondition: 'default',
  properties: {
    /** Text color of an element (can be set hoverable) */
    color: vars.colors,
    /** Background color of an element (can be set hoverable) */
    backgroundColor: vars.colors,
    /** Box shadow of an element (can be set hoverable) */
    boxShadow: vars.shadows,
    /** Text decoration of an element (can be set hoverable) */
    textDecoration: ['none', 'underline'],
  },
})

/** Remaining properties that are neither responsive nor hoverable */
const remainingProperties = defineProperties({
  properties: {
    /** Font weight of an element */
    fontWeight: vars.typography.fontWeights,
    /** Font family of an element */
    fontFamily: {
      primary: vars.typography.fonts.primaryFontFamily,
      secondary: vars.typography.fonts.secondaryFontFamily,
    },
  },
})

/**
 * Sprinkles function to be further processed in the atoms()-utility
 */
export const sprinkles = createSprinkles(
  hoverableProperties,
  responsiveProperties,
  remainingProperties
)

export type Sprinkles = Parameters<typeof sprinkles>[0]
