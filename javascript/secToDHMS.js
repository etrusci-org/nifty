export function secToDHMS(sec, padHMS = true, tpl = { prefix: '', d: '{d}d ', h: '{h}h ', m: '{m}m ', s: '{s}s', suffix: '' }) {
    /**
     * Pad the start of a number with a specific amount of characters.
     *
     * @param {number} num  Number to be padded.
     * @param {number} width  Desired maximum length of the returned string.
     * @param {string} filler  Character to be used for padding.
     * @returns {string}  Padded number.
     */
    let padNum = (num, width = 2, filler = '0') => {
        let str = num.toString();
        if (str.length >= width) {
            return str;
        }
        return filler.repeat(width - str.length) + str;
    };
    sec = Math.max(0, sec);
    let d = Math.floor(sec / (3600 * 24));
    let h = Math.floor(sec % (3600 * 24) / 3600);
    let m = Math.floor(sec % 3600 / 60);
    let s = Math.floor(sec % 60);
    let out = '';
    if (tpl.hasOwnProperty('prefix')) {
        out += tpl.prefix;
    }
    if (tpl.hasOwnProperty('d')) {
        out += tpl.d.replace('{d}', d.toString());
    }
    if (tpl.hasOwnProperty('h')) {
        out += tpl.h.replace('{h}', (padHMS) ? padNum(h) : h.toString());
    }
    if (tpl.hasOwnProperty('m')) {
        out += tpl.m.replace('{m}', (padHMS) ? padNum(m) : m.toString());
    }
    if (tpl.hasOwnProperty('s')) {
        out += tpl.s.replace('{s}', (padHMS) ? padNum(s) : s.toString());
    }
    if (tpl.hasOwnProperty('suffix')) {
        out += tpl.suffix;
    }
    return out;
}
