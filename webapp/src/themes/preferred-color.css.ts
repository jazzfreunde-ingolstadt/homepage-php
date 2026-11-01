import { colorProperties as lightColors } from './light-theme.css'
import { colorProperties as darkColors } from './dark-theme.css'
import { themes } from '@michemayer/vanilla-extract-styles'

export default themes.colors.createPreferedColorThemeSwitch(
  lightColors,
  darkColors
)