/**
 * Get a random item from an array.
 *
 * @param {array} arr  Array to chose the items from.
 * @returns {any | null}  Random array item or null if the input array is empty.
 */
export function getRandomArrayItem(arr: any[]): any | null {
    if (arr.length == 0) {
        return null
    }
    return arr[Math.floor(Math.random() * arr.length)]
}
