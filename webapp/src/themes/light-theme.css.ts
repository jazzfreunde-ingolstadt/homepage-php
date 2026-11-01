import { themes, utils } from '@michemayer/vanilla-extract-styles'
import type { ColorContract } from '@michemayer/vanilla-extract-styles'

/**
 * Theme exclusive colors
 *
 * For simplicity and maintainability, only a subset is used within the theme.
 */
export const colors = {
  ...utils.colors.createTintAndShades({ baseline: '#1a1a18', name: 'spacegray' }),
  ...utils.colors.createTintAndShades({ baseline: '#dad9d9', name: 'lightgray' }),
  ...utils.colors.createTintAndShades({ baseline: '#f3f3f5', name: 'ivory' }),
  ...utils.colors.createTintAndShades({ baseline: '#9e2a2f', name: 'rust' }),
  ...utils.colors.createTintAndShades({ baseline: '#b4cdb4', name: 'sage' }),
  ...utils.colors.createTintAndShades({ baseline: '#ffac00', name: 'sun' }),
} as const

export const colorProperties = {
  primaryOneDefault: colors.spacegray100,
  primaryOneLight: colors.spacegray080,
  primaryOneDark: colors.spacegray120,

  secondaryDefault: colors.ivory080,
  secondaryLight: colors.ivory060,
  secondaryDark: colors.ivory120,

  textDefault: colors.spacegray100,
  textLight: colors.ivory090,
  textDark: colors.spacegray100,

  dangerDefault: colors.rust100,
  dangerLight: colors.rust060,
  dangerDark: colors.rust140,

  successDefault: colors.sage130,
  successLight: colors.sage060,
  successDark: colors.sage140,

  warningDefault: colors.sun100,
  warningLight: colors.sun060,
  warningDark: colors.sun140,

  shadowsDefault: colors.lightgray080,
  shadowsLight: colors.lightgray060,
  shadowsDark: colors.lightgray100,
} satisfies ColorContract;

export default themes.colors.createTheme(
    colorProperties,
);