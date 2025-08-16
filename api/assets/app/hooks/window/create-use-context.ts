import { createContext, useContext } from 'react'

/**
 * Helper to easily generate a ContextProvider and corresponding hook
 *
 * @param defaultValue Default values of the Context
 * @returns Array with the first element being the provider, the second the hook
 */
export const createUseContext = <T>(defaultValue: T = {} as T) => {
    const Context = createContext<T>(defaultValue)
    const useContextConsumer = () => {
        const ctx = useContext(Context)

        if (!ctx || !Object.keys(ctx as Record<string, unknown>).length) {
            throw new Error(`Component was rendered outside of its parent context`)
        }
        return ctx
    }
    return [Context.Provider, useContextConsumer] as const
}
