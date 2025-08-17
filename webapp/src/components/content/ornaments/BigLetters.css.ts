import { recipe } from '@vanilla-extract/recipes'

export const bigLetters = recipe({
    base: {
        fontWeight: 'bold',
        textTransform: 'uppercase',
        letterSpacing: '0.1em',
        whiteSpace: 'word-break',
        fontSize: '',
    }
})