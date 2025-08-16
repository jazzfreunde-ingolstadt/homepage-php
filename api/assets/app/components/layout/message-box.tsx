import React from 'react'

interface MessageBoxProps {
    /**
     * The content of the message box
     * This is the main content of the box
     */
    children: React.ReactNode
}

/**
 * Renders a simple message box
 * @param children The content of the message box
 * @returns A message box
 */
export const MessageBox = ({ children }: MessageBoxProps) => {
    return (
        <div className="p-8 rounded-xl shadow-md bg-white">
            {children}
        </div>
    )
}