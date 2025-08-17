import type { SizeVariant } from '@styles/properties/size-variant.property';
import { sizeVariantNames } from '@styles/properties/size-variant.property';

/** Names of all available breakpoints */
export const breakpointNames = sizeVariantNames;

/** Type that holds possible values for a breakpoint */
export type Breakpoint = SizeVariant;

/** Value map of all available breakpoints and their corresponding screen widths */
export const breakpoints: Record<Breakpoint, string> = {
  xs: '0px',
  sm: '576px',
  md: '768px',
  lg: '992px',
  xl: '1200px',
  '2xl': '1600px',
  '3xl': '1920px',
} as const;