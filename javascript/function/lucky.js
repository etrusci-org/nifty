// @ts-check
'use strict'

/**
 * Float representing the chance to be lucky.
 * Valid range is between 0.0 (lose) and 1.0 (win).
 *
 * @typedef {number} luckyChance
 */


/**
 * Be lucky or not.
 *
 * @param {luckyChance} chance  Chance to be lucky.
 * @returns {boolean}  Whether the roll was a lucky one.
 *
 * @example lucky.example.html
 * @see https://developer.mozilla.org/docs/Web/JavaScript/Reference/Global_Objects/Math/random
 */
function lucky(chance) {
    chance = (chance >= 0.0 && chance <= 1.0) ? chance : 0.0
    return Math.random() < chance
}
