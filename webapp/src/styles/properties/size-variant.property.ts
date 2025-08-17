/**
 * T-Shirt size like sizing variants for uniform sizing across components and
 * other size related settings
 */
export type SizeVariant = 'xs' | 'sm' | 'md' | 'lg' | 'xl' | '2xl' | '3xl';

/** Names of all available size variants */
export const sizeVariantNames: readonly SizeVariant[] = [
  'xs',
  'sm',
  'md',
  'lg',
  'xl',
  '2xl',
  '3xl',
] as const;