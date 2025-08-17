/**
 * Interface to add additional class names to the component
 */
export interface ClassNames { 
    classNames?: Record<string, boolean> | Record<any, any> | Iterable<string> | Iterable<any> | string;
 }