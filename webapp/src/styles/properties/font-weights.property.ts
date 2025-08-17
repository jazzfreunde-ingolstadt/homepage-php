/** Available font weights */
export const fontWeights = {
    normal: '400',
    bold: '700',
  } as const
  
  /** Type that holds possible font weight values */
  export type FontWeight = keyof typeof fontWeights
  