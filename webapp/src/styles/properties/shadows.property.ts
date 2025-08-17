export const shadows = {
    none: 'none',
    xs: `0px 0px 0.2px rgba(0, 0, 0, 0.031), 0px 0px 0.5px rgba(0, 0, 0, 0.044), 0px 0px 0.9px rgba(0, 0, 0, 0.056), 0px 0px 1.6px rgba(0, 0, 0, 0.069), 0px 0px 5px rgba(0, 0, 0, 0.2)`,
    sm: `0px 0px 0.5px rgba(0, 0, 0, 0.031),0px 0px 1.1px rgba(0, 0, 0, 0.044), 0px 0px 2px rgba(0, 0, 0, 0.056), 0px 0px 3.5px rgba(0, 0, 0, 0.069), 0px 0px 11px rgba(0, 0, 0, 0.2)`,
    md: `0px 0px 0.7px rgba(0, 0, 0, 0.031), 0px 0px 1.5px rgba(0, 0, 0, 0.044), 0px 0px 2.7px rgba(0, 0, 0, 0.056), 0px 0px 4.8px rgba(0, 0, 0, 0.069), 0px 0px 15px rgba(0, 0, 0, 0.2)`,
    lg: `0px 0px 1.6px rgba(0, 0, 0, 0.031), 0px 0px 3.6px rgba(0, 0, 0, 0.044), 0px 0px 6.2px rgba(0, 0, 0, 0.056), 0px 0px 11.3px rgba(0, 0, 0, 0.069), 0px 0px 35px rgba(0, 0, 0, 0.2)`,
    xl: `0px 1px 2.1px rgba(0, 0, 0, 0.028), 0px 2.3px 5px rgba(0, 0, 0, 0.04), 0px 4.4px 9.4px rgba(0, 0, 0, 0.05), 0px 7.8px 16.8px rgba(0, 0, 0, 0.06), 0px 14.6px 31.3px rgba(0, 0, 0, 0.072), 0px 35px 75px rgba(0, 0, 0, 0.2)`,
    '2xl': `0px 1.9px 3.3px rgba(0, 0, 0, 0.037), 0px 4.7px 8px rgba(0, 0, 0, 0.053), 0px 8.8px 15px rgba(0, 0, 0, 0.065), 0px 15.6px 26.8px rgba(0, 0, 0, 0.077), 0px 29.2px 50.1px rgba(0, 0, 0, 0.093), 0px 70px 120px rgba(0, 0, 0, 0.2)`,
  } as const
  
  export type Shadow = keyof typeof shadows
  