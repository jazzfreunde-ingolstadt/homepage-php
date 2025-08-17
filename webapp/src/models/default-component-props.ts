import type { ClassNames } from '@models/classnames.model'

/**
 * Common properties every component should support
 */
export interface DefaultComponentProps extends ClassNames {
    /** HTML id property */
    id?: string
  }