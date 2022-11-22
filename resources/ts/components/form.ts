import { dispatchEvent } from "@/lib"

interface ErrorResponse {
    message: string
    errors: Record<string, string[]>
}

export interface FormProps {
    isAsync: boolean
    hasFiles: boolean
}

const defaultProps: FormProps = {
    isAsync: false,
    hasFiles: false,
}

const processResponse = async (r: Response) => {
    if (r.status === 204) return null

    const content = await r.json()

    if (r.ok) return content
    throw content
}

export const Form = ({ isAsync, hasFiles }: FormProps = defaultProps) => {
    const errors: string[] = []

    return {
        isLoading: false,
        errors,
        onSubmitForm(event: Event) {
            if (!isAsync) {
                if (this.isLoading) return event.preventDefault()
                return (this.isLoading = true)
            }

            event.preventDefault()
            this.isLoading = true

            const form = event.target as HTMLFormElement
            dispatchEvent(form, "start")

            const formData = form.method === "GET" ? null : new FormData(form)

            const headers: Record<string, string> = {
                Accept: "application/json",
            }

            const body = !hasFiles
                ? formData
                    ? JSON.stringify(Object.fromEntries(formData))
                    : null
                : formData

            if (!hasFiles) {
                headers["Content-Type"] = "application/json"
            }

            fetch(form.action, {
                method: form.method,
                headers,
                body,
            })
                .then((r) => processResponse(r))
                .then((data) => dispatchEvent(form, "success", data))
                .catch((errors: Error | ErrorResponse) => {
                    if ("errors" in errors) {
                        this.errors = Object.values(errors.errors).flat()
                    } else {
                        this.errors = [errors.message]
                    }
                    dispatchEvent(form, "error", errors)
                })
                .finally(() => (this.isLoading = false))
        },
        pushInputError(event: CustomEvent) {
            this.errors = []
            this.errors = [event.detail]
        },
    }
}
