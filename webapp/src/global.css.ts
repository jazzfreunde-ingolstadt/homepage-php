import { customFontFaces } from '@michemayer/vanilla-extract-styles/global/font-faces.css'
import { fontFaces } from './themes/font-faces.css'

/**
 * This file imports files that are non component specific and are needed for
 * base styling like providing font-faces and adding non-theme specific variables.
 */

customFontFaces(fontFaces)

/* CSS Reset */
import '@michemayer/vanilla-extract-styles/global/reset.css'
