/**
 * Automagically add target="_blank" to anchors that link to a different place.
 *
 * @param {array} localHostnames  Hostnames in this array will be kept alone.
 * @returns {void}
 */
export function autoBlankExtHost(localHostnames: string[]): void {
    let anchors = document.querySelectorAll('a')
    anchors.forEach(e => {
        if (localHostnames.indexOf(e.hostname) == -1) {
            e.setAttribute('target', '_blank')
        }
    })
}
