import type { FontFamily } from '@styles/properties/font-faces.property'
import { createThemeContract } from '@vanilla-extract/css'

export type TypographyContract = {
    primaryFontFamily: FontFamily,
    secondaryFontFamily: FontFamily,
};

const properties = {
    primaryFontFamily: 'Bookman Old Style',
    secondaryFontFamily: 'Harlow Solid',
} as const satisfies TypographyContract;

export const typographyContract = createThemeContract(properties)
