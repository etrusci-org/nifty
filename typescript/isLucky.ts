/**
 * Be lucky or not.
 *
 * @param {number} chance  Float between 0.0 (lose) and 1.0 (win).
 * @returns {boolean}  Whether the roll was a lucky one.
 */
export function isLucky(chance: number): boolean {
    chance = (chance >= 0.0 && chance <= 1.0) ? chance : 0.0
    return Math.random() < chance
}
