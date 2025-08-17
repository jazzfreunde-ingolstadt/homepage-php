import type { FontSizeContract } from '@styles/contracts/font-size.contract.css'

/**
 * Object with all available font sizes and their corresponding values for
 * screens from 0px < breakpoints.medium
 */
export const fontSizesXsToSm = {
  xs: '0.75rem', // 12px
  sm: '0.875rem', // 14px
  md: '1rem', // 16px
  default: '1rem', // 16px | default size, also used for "h6"
  lg: '1.125rem', // 18px | used for "h5"
  xl: '1.25rem', // 20px | used for "h4"
  '2xl': '1.375rem', // 22px | used for "h3"
  '3xl': '1.5rem', // 24px
  '4xl': '1.625rem', // 26px | used for "h2"
  '5xl': '1.75rem', // 28px | used for "h1"
  '6xl': '3rem', // 48px
} as const satisfies FontSizeContract;

/**
 * Object with all available font sizes and their corresponding values for
 * screens >= breakpoints.medium < breakpoints.lg
 */
export const fontSizesMdTo3Xl = {
  xs: '0.75rem', // 12px
  sm: '0.875rem', // 14px
  md: '1rem', // 16px
  default: '1.125rem', // 18px | default size, also used for "h6"
  lg: '1.25rem', // 20px | used for "h5"
  xl: '1.5rem', // 24px | used for "h4"
  '2xl': '1.875rem', // 30px | used for "h3"
  '3xl': '2.25rem', // 36px
  '4xl': '2.5rem', // 40px | used for "h2"
  '5xl': '3rem', // 48px | used for "h1"
  '6xl': '4.5rem', // 72px
} as const satisfies FontSizeContract;

/**
 * Object with all available font sizes and their corresponding values for
 * screens >= breakpoints.3xl
 */
export const fontSizesFrom3Xl = {
  xs: '0.75rem', // 12px
  sm: ' 0.875rem', // 14px
  md: '1rem', // 16px
  default: '1.25rem', // 20px | default size, also used for "h6"
  lg: '1.375rem', // 22px | used for "h5"
  xl: '1.625rem', // 26px | used for "h4"
  '2xl': '2rem', // 32px | used for "h3"
  '3xl': '3rem', // 48px
  '4xl': '3.625rem', // 58px | used for "h2"
  '5xl': '4.5rem', // 72px | used for "h1"
  '6xl': '5.625rem', // 90px
} as const satisfies FontSizeContract;

export type FontSize = keyof typeof fontSizesXsToSm;
