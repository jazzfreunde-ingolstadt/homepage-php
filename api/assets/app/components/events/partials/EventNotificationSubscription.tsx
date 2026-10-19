import React, { useEffect, useId, useRef, useState } from 'react'
import { MessageBox } from '@components/layout/message-box'
import { useEventNotificationSubscription } from '@components/events/hooks/events-hooks'

interface EventNotificationSubscriptionProps {
    eventId: number | null
    expirationTime: string | null
    isOpen: boolean
    onClose: () => void
    onSubscribed: (eventId: number) => void
    notificationPrivacyUrl: string
}

/**
 * Opens a subscription form for notifications about a specific event.
 */
export const EventNotificationSubscription = ({
    eventId,
    expirationTime,
    isOpen,
    onClose,
    onSubscribed,
    notificationPrivacyUrl,
}: EventNotificationSubscriptionProps) => {
    const [email, setEmail] = useState('')
    const dialogRef = useRef<HTMLDialogElement>(null)
    const emailInputId = useId()
    const {
        error,
        isSubmitted,
        isSubmitting,
        reset,
        submitSubscription,
    } = useEventNotificationSubscription(eventId, expirationTime)

    useEffect(() => {
        const dialog = dialogRef.current
        if (!dialog) {
            return
        }

        if (isOpen && !dialog.open) {
            dialog.showModal()
        } else if (!isOpen && dialog.open) {
            dialog.close()
        }
        if (isOpen) {
            reset()
        }
    }, [isOpen, eventId, reset])

    const handleSubmit = async (submitEvent: React.FormEvent<HTMLFormElement>) => {
        submitEvent.preventDefault()
        const result = await submitSubscription(email)
        if (result !== null && eventId !== null) {
            onSubscribed(eventId)
        }
    }

    return (
        <>
            <dialog
                ref={dialogRef}
                aria-labelledby="event-notification-title"
                className="fixed inset-0 m-auto max-h-[calc(100%-2rem)] w-[calc(100%-2rem)] max-w-2xl overflow-hidden rounded-xl border-0 bg-transparent p-0 backdrop:bg-black/50"
                onCancel={(cancelEvent) => {
                    cancelEvent.preventDefault()
                    onClose()
                }}
                onClick={(clickEvent) => {
                    if (clickEvent.target === dialogRef.current) {
                        onClose()
                    }
                }}
            >
                <MessageBox>
                    <div className="flex justify-end">
                        <button
                            type="button"
                            className="text-blue font-bold no-underline hover:underline"
                            onClick={onClose}
                        >
                            Schließen
                        </button>
                    </div>
                    <h2 id="event-notification-title" className="text-xl md:text-2xl font-bold mb-2 text-blue">
                        Möchten Sie über diese Veranstaltung benachrichtigt werden?
                    </h2>
                    <p className="text-xl md:text-2xl mb-5 md:mb-8 font-bold text-orange">
                        Erhalten Sie eine E-Mail, sobald es Neuigkeiten gibt.
                    </p>
                    {isSubmitted ? (
                        <p role="status" className="text-blue">
                            Bitte bestätigen Sie Ihr Abonnement über den Link in der E-Mail.
                        </p>
                    ) : (
                        <form onSubmit={handleSubmit}>
                            <div className="w-full flex flex-col md:flex-row gap-5 lg:gap-10">
                                <div className="relative w-full md:flex-shrink md:flex-grow">
                                    <input
                                        id={emailInputId}
                                        type="email"
                                        autoComplete="email"
                                        required
                                        value={email}
                                        onChange={(changeEvent) => setEmail(changeEvent.target.value)}
                                        placeholder=" "
                                        className="block px-2.5 pb-2.5 pt-4 w-full text-sm text-grey bg-transparent rounded-lg border border-grey appearance-none focus:outline-none focus:ring-0 focus:border-blue peer"
                                    />
                                    <label
                                        htmlFor={emailInputId}
                                        className="absolute text-sm text-grey duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] rounded bg-white px-2 peer-focus:px-2 peer-focus:text-blue peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1"
                                    >
                                        E-Mail-Adresse
                                    </label>
                                </div>
                                <div className="relative flex-none">
                                    <button
                                        type="submit"
                                        disabled={isSubmitting}
                                        className="bg-orange hover:bg-yellow text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline disabled:cursor-not-allowed disabled:opacity-50"
                                    >
                                        {isSubmitting ? 'Wird gesendet...' : 'Senden'}
                                    </button>
                                </div>
                            </div>
                            {error && <p role="alert" className="mt-3 text-red-700">{error}</p>}
                        </form>
                    )}
                    <p className="mt-3 text-sm text-grey">
                        Informationen zur Verarbeitung Ihrer Daten finden Sie in unserer{' '}
                        <a
                            href={notificationPrivacyUrl}
                            target="_blank"
                            rel="noopener noreferrer"
                            className="font-bold text-blue underline"
                        >
                            Datenschutzerklärung für Benachrichtigungen
                        </a>.
                    </p>
                </MessageBox>
            </dialog>
        </>
    )
}
