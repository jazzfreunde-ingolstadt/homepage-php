import defaultThemeClass from "@styles/themes/defaultTheme.css";

/** Map all available brands to their corresponding theme classes */
export const themesClasses = {
    default: defaultThemeClass,
  };
  
  export type Theme = keyof typeof themesClasses;