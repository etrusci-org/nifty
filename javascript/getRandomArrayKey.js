/**
 * Get a random numeric array key.
 *
 * @param {array} arr  Array to chose the keys from.
 * @returns {number | null}  Random array key or null if the input array is empty.
 */
export function getRandomArrayKey(arr) {
    if (arr.length == 0) {
        return null;
    }
    return Math.floor(Math.random() * arr.length);
}
