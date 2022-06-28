/**
 * Automagically add target="..." to anchors that link to a different domain.
 *
 * @param {string} [target='_blank']  Anchor target.
 * @param {string} [cssClass='external-link']  CSS class to add to the anchor.
 * @returns {void}
 */
export function addTargetToExtLinks(target = '_blank', cssClass = 'external-link') {
    let anchors = document.querySelectorAll('a');
    anchors.forEach(e => {
        if (e.hostname && document.location.hostname != e.hostname) {
            e.setAttribute('target', target);
            if (cssClass) {
                e.classList.add(cssClass);
            }
        }
    });
}
