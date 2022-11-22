export function dispatchEvent(
    element: HTMLElement,
    type: string,
    detail: any = {}
) {
    return element.dispatchEvent(
        new CustomEvent(type, {
            bubbles: true,
            cancelable: true,
            detail,
        })
    )
}
