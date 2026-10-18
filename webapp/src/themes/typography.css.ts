import { themes } from '@michemayer/vanilla-extract-styles'
import type { TypographyContract } from '@michemayer/vanilla-extract-styles'
import { fontFamilies } from './font-faces.css'

export const typographyProperties = {
  primary: {
    fontFamily: fontFamilies.ffDin,
    fontSize: '100%',
  },
  secondary: {
    fontFamily: fontFamilies.ffDin,
    fontSize: '100%',
  },
} satisfies TypographyContract

export default themes.typography.createTheme(
  typographyProperties,
)