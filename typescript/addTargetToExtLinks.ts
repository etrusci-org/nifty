/**
 * Automagically add target="..." to anchors that link to a different domain.
 *
 * @param {string} [target='_blank']  Anchor target.
 * @returns {void}
 */
 export function addTargetToExtLinks(target: string = '_blank'): void {
    document.querySelectorAll('a').forEach(e => {
        if (document.location.hostname != e.hostname) {
            e.setAttribute('target', target)
        }
    })
}
