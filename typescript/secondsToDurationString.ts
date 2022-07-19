type tplType = {
    prefix: string,
    d: string,
    h: string,
    m: string,
    s: string,
    suffix: string
}


/**
 * Convert seconds to a human readable duration format.
 *
 * @param {number} sec  Seconds to be converted. Negative numbers will be treated as 0 (zero).
 * @param {boolean} [padHMS=true]  Whether to pad hours, minutes and seconds < 10 with 0 (zero).
 * @param {tplType} [tpl={ prefix: '', d: '{d}d ', h: '{h}h ', m: '{m}m ', s: '{s}s', suffix: '' }]  Template to build the output string from.
 * @returns {string}  Converted duration string.
 */
export function secondsToDurationString(sec: number, padHMS: boolean = true, tpl: tplType = { prefix: '', d: '{d}d ', h: '{h}h ', m: '{m}m ', s: '{s}s', suffix: '' }): string {
    /**
     * Pad the start of a number with a specific amount of characters.
     *
     * @param {number} num  Number to be padded.
     * @param {number} width  Desired maximum length of the returned string.
     * @param {string} filler  Character to be used for padding.
     * @returns {string}  Padded number.
     */
    let padNum = (num: number, width: number = 2, filler: string = '0'): string => {
        let str = num.toString()
        if (str.length >= width) {
            return str
        }
        return filler.repeat(width - str.length) + str
    }

    sec = Math.max(0, sec)

    let d = Math.floor(sec / (3600 * 24))
    let h = Math.floor(sec % (3600 * 24) / 3600)
    let m = Math.floor(sec % 3600 / 60)
    let s = Math.floor(sec % 60)

    let out = ''

    if (tpl.hasOwnProperty('prefix')) {
        out += tpl.prefix
    }

    if (tpl.hasOwnProperty('d')) {
        out += tpl.d.replace('{d}', d.toString())
    }

    if (tpl.hasOwnProperty('h')) {
        out += tpl.h.replace('{h}', (padHMS) ? padNum(h) : h.toString())
    }

    if (tpl.hasOwnProperty('m')) {
        out += tpl.m.replace('{m}', (padHMS) ? padNum(m) : m.toString())
    }

    if (tpl.hasOwnProperty('s')) {
        out += tpl.s.replace('{s}', (padHMS) ? padNum(s) : s.toString())
    }

    if (tpl.hasOwnProperty('suffix')) {
        out += tpl.suffix
    }

    return out
}
