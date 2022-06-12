/**
 * Get a random integer.
 *
 * @param {number} min  Smallest number to include in the range.
 * @param {number} max  Largest number to include in the range.
 * @returns {number}  Random integer.
 */
export function randomInteger(min: number, max: number): number {
    min = Math.ceil(min)
    max = Math.floor(max)
    return Math.floor(Math.random() * (max - min + 1) + min)
}
