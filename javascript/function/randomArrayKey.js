// @ts-check
'use strict'

/**
 * Get a random numeric array key.
 *
 * @param {array} arr  Array to chose the keys from.
 * @returns {number}  Random array key.
 *
 * @example randomArrayKey.example.html
 * @see https://developer.mozilla.org/docs/Web/JavaScript/Reference/Global_Objects/Math/random
 */
function randomArrayKey(arr) {
    return Math.floor(Math.random() * arr.length)
}
