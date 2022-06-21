/**
 * Automagically add target="..." to anchors that link to a different place.
 *
 * @param {array} localHostnames  Hostnames in this array will be kept alone.
 * @param {string} [target='_blank']  Link target.
 * @returns {void}
 */
export function addTargetToExtLinks(localHostnames, target = '_blank') {
    let anchors = document.querySelectorAll('a');
    anchors.forEach(e => {
        if (localHostnames.indexOf(e.hostname) == -1) {
            e.setAttribute('target', target);
        }
    });
}
