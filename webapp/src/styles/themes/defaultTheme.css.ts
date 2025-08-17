import { createTheme } from '@vanilla-extract/css'
// import { colors as globalColors } from '@styles/properties/colors.property'
import { createTintAndShades } from '@styles/properties/colors.property'
import type { ColorContract } from '@styles/contracts/color.contract.css'
import { colorContract } from '@styles/contracts/color.contract.css'
import type { TypographyContract } from '@styles/contracts/typography.contract.css'
import { typographyContract } from '@styles/contracts/typography.contract.css'

/**
 * Theme exclusive colors
 *
 * For simplicity and maintainability, only a subset is used within the theme.
 */
export const colors = {
  ...createTintAndShades({ baseline: '#1a1a18', name: 'spacegray' }),
  ...createTintAndShades({ baseline: '#eaeaef', name: 'ivory' }),
  ...createTintAndShades({ baseline: '#9e2a2f', name: 'rust' }),
  ...createTintAndShades({ baseline: '#b4cdb4', name: 'sage' }),
  ...createTintAndShades({ baseline: '#ffac00', name: 'sun' }),
} as const

export const colorProperties = {
  primaryOneDefault: colors.spacegray100,
  primaryOneLight: colors.spacegray080,
  primaryOneDark: colors.spacegray120,

  secondaryDefault: colors.ivory120,
  secondaryLight: colors.ivory090,
  secondaryDark: colors.ivory140,

  textDefault: colors.spacegray100,
  textLight: colors.ivory090,
  textDark: colors.ivory140,

  dangerDefault: colors.rust100,
  dangerLight: colors.rust060,
  dangerDark: colors.rust140,

  successDefault: colors.sage130,
  successLight: colors.sage060,
  successDark: colors.sage140,

  warningDefault: colors.sun100,
  warningLight: colors.sun060,
  warningDark: colors.sun140,
} satisfies ColorContract;

export const typographyProperties = {
  primaryFontFamily: 'Bookman Old Style',
  secondaryFontFamily: 'Harlow Solid',
} satisfies TypographyContract;

export default createTheme(
  {
    colors: colorContract,
    typography: typographyContract,
  },
  {
    colors: colorProperties,
    typography: typographyProperties,
  }
);