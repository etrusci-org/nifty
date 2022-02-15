// @ts-check
'use strict'

/**
 * Convert seconds to a human readable duration format.
 *
 * @param {number} sec  Seconds to be converted.
 * @param {boolean} [milli=false]  Whether to treat sec as milliseconds.
 * @param {boolean} [pad=true]  Whether to pad single digit numbers for hours, minutes and seconds with a 0 (zero).
 * @returns {string}  Converted duration.
 *
 * @example secToDHMS.example.html
 */
function secToDHMS(sec, milli=false, pad=true) {
    /**
     * Pad positive single digit numbers with a 0 (zero).
     *
     * @param {number} num  Number to be padded.
     * @returns {string}  Padded or original number.
     */
    let padNum = (num) => {
        return (num < 10 && num >= 0) ? `0${num}` : `${num}`
    }

    if (milli) {
        sec = sec / 1000
    }

    sec = Math.max(0, sec)

    let d = Math.floor(sec / (3600 * 24))
    let h = Math.floor(sec % (3600 * 24) / 3600)
    let m = Math.floor(sec % 3600 / 60)
    let s = Math.floor(sec % 60)

    if (pad) {
        if (d > 0) return `${d}d ${padNum(h)}h ${padNum(m)}m ${padNum(s)}s`
        if (h > 0) return `${padNum(h)}h ${padNum(m)}m ${padNum(s)}s`
        if (m > 0) return `${padNum(m)}m ${padNum(s)}s`
        return `${padNum(s)}s`
    }
    else {
        if (d > 0) return `${d}d ${h}h ${m}m ${s}s`
        if (h > 0) return `${h}h ${m}m ${s}s`
        if (m > 0) return `${m}m ${s}s`
        return `${s}s`
    }
}
