/**
 * Get a random item from an array.
 *
 * @param {array} arr  Array to chose the items from.
 * @returns {any}  Random array item.
 */
export function randomArrayItem(arr: any[]): any {
    return arr[Math.floor(Math.random() * arr.length)]
}
