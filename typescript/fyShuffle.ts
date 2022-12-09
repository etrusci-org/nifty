/**
 * Generate a random permutation of a finite sequence with the Fisher–Yates shuffle algorithm.
 *
 * @param {array} arr  Array to shuffle.
 * @returns {array}  The shuffled array.
 * @see https://en.wikipedia.org/wiki/Fisher%E2%80%93Yates_shuffle
 */
export function fyShuffle(arr: any[]): any[] {
    let copy = [...arr]

    for (let i = copy.length - 1; i > 0; i--) {
        const y = Math.floor(Math.random() * i)
        const z = copy[i]
        copy[i] = copy[y]
        copy[y] = z
    }

    return copy
}
