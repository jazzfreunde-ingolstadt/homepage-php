import { utils } from '@michemayer/vanilla-extract-styles'

export const colorProperties = {
  inverse: { ...utils.colors.createTintAndShades({ baseline: '#ffffff', name: 'white' }) }, 
  accentOne: { ...utils.colors.createTintAndShades({ baseline: '#242c7f', name: 'athens' }) },
  accentTwo: { ...utils.colors.createTintAndShades({ baseline: '#e8c400', name: 'rusticyellow' }) },
  accentThree: { ...utils.colors.createTintAndShades({ baseline: '#bf1300', name: 'milanored' }) },
} as const

export type CustomColors = keyof typeof colorProperties
