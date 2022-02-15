// @ts-check
'use strict'

/**
 * Get a random item from an array.
 *
 * @param {array} arr  Array to chose the items from.
 * @returns {any}  Random array item.
 *
 * @example randomArrayItem.example.html
 * @see https://developer.mozilla.org/docs/Web/JavaScript/Reference/Global_Objects/Math/random
 */
function randomArrayItem(arr) {
    return arr[Math.floor(Math.random() * arr.length)]
}
