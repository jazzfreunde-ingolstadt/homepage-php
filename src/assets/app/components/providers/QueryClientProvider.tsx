import React from 'react'
import type { ReactNode } from 'react'
import { QueryClient, QueryClientProvider } from '@tanstack/react-query'
import { config } from 'config'

export interface QueryProviderProps {
    children?: ReactNode
}

/**
 * The pre-configured react-query query client.
 */
export const queryClient = new QueryClient({
    defaultOptions: {
      queries: {
        staleTime: config.staleTime,
        retry: false,
      },
    },
  });

/**
 * Pre-configured React Query provider with devtools.
 */
export default ({ children }: QueryProviderProps) => (
    <QueryClientProvider client={queryClient}>
        {children}
    </QueryClientProvider>
)