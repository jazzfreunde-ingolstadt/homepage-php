import React from 'react'
import type { ReactNode } from 'react'
import QueryProvider from './QueryClientProvider'

interface ProviderProps {
    /** The children, that need to be wrapped within the providers */
    children: ReactNode
}

/**
 * Wraps the given children within the necessary providers.
 */
export const Providers = ({ children }: ProviderProps) => (
    <QueryProvider>{children}</QueryProvider>
)