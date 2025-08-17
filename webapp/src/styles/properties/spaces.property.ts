/**
 * Object with available SPACES including shorthands and precise values,
 * that are available in most spacing props like margin, paddings.
 *
 * Values are provides in rem for better a11y and calculated on browsers default
 * font-size of 16px. The keys correspond to the px value for easier lookup.
 */
export const spaces = {
    none: '0px', // 0px
    auto: 'auto',
    px: '0.0625rem', // 1px
    '3xs': '0.375rem', // 6px
    '2xs': '0.75rem', // 12px
    xs: '0.875rem', // 14px
    sm: '1rem', // 16px
    md: '1.5rem', // 24px
    lg: '2.25rem', // 36px
    xl: '2.5rem', // 40px
    '2xl': '3rem', // 48px
    '3xl': '5.625rem', // 90px
    '4xl': '9.375rem', // 150px
  } as const
  
  export type Space = keyof typeof spaces