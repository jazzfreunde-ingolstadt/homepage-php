import { sprinkles } from '@styles';

export const shortDate = sprinkles({
    display: { xs: 'block', md: 'none' },
});

export const longDate = sprinkles({
    display: { xs: 'none', md: 'block' },
});