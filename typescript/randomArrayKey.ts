/**
 * Get a random numeric array key.
 *
 * @param {array} arr  Array to chose the keys from.
 * @returns {number}  Random array key.
 */
export function randomArrayKey(arr: any[]): number {
    return Math.floor(Math.random() * arr.length)
}
