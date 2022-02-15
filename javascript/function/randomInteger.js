// @ts-check
'use strict'

/**
 * Get a random integer.
 *
 * @param {number} min  Smallest number to include in the range.
 * @param {number} max  Largest number to include in the range.
 * @returns {number}  Random integer.
 *
 * @example randomInteger.example.html
 * @see https://developer.mozilla.org/docs/Web/JavaScript/Reference/Global_Objects/Math/random
 */
function randomInteger(min, max) {
    min = Math.ceil(min)
    max = Math.floor(max)
    return Math.floor(Math.random() * (max - min + 1) + min)
}
