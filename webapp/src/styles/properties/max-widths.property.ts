/**
 * Object with all available max-widths and their pixel values. Mostly used to
 * limit container widths.
 */
export const maxWidths = {
    none: 'none',
    xs: '550px',
    sm: '738px',
    md: '960px',
    lg: '1200px',
    xl: '1440px',
    '2xl': '1760px',
    full: '100%',
  } as const
  
  /** Type that holds possible values for a max width */
  export type MaxWidth = keyof typeof maxWidths
  