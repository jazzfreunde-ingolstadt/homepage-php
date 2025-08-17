import { createThemeContract } from '@vanilla-extract/css'

const properties = {
    primaryOneDefault: '',
    primaryOneLight: '',
    primaryOneDark: '',

    secondaryDefault: '',
    secondaryLight: '',
    secondaryDark: '',

    textDefault: '',
    textLight: '',
    textDark: '',

    dangerDefault: '',
    dangerLight: '',
    dangerDark: '',

    successDefault: '',
    successLight: '',
    successDark: '',

    warningDefault: '',
    warningLight: '',
    warningDark: '',
}

/** Theme contract */
export type ColorContract = typeof properties;

/** Theme specific color */
export type ThemeColor = keyof typeof colorContract;

type InferColorGroup<T extends string> = T extends `${infer Prefix}Default`
  ? Prefix
  : never

export type ColorGroup = InferColorGroup<ThemeColor>

export const colorContract = createThemeContract(properties)
