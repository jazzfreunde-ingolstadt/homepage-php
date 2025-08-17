import { breakpoints } from '@styles/properties/breakpoints.property'
import { spaces } from '@styles/properties/spaces.property'
import { colorContract } from '@styles/contracts/color.contract.css'
import { typographyContract } from '@styles/contracts/typography.contract.css'
import { fontSizeContract } from '@styles/contracts/font-size.contract.css'
import { maxWidths } from '@styles/properties/max-widths.property'
import { colors } from '@styles/properties/colors.property'
import { shadows } from '@styles/properties/shadows.property'
import { fontWeights } from '@styles/properties/font-weights.property'

export const vars = {
    breakpoints,
    spaces,
    maxWidths,
    colors: {
        ...colors,
        ...colorContract,
    },
    shadows,
    typography: {
        fontWeights,
        fontSizes: fontSizeContract,
        fonts: typographyContract,
    }
}