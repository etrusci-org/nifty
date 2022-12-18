/**
 * Test a number for primality.
 *
 * Note that this checks with trial division and is thus very slow on large numbers.
 *
 * @param {number} num  Number to test.
 * @returns {boolean}  Whether the number is a prime.
 * @see https://en.wikipedia.org/wiki/Prime_numbers
 */
export function isPrime(num) {
    if (num < 2) {
        return false;
    }
    if (num == 2) {
        return true;
    }
    if (num % 2 == 0) {
        return false;
    }
    const divLast = Math.round(Math.pow(num, 0.5)) + 1;
    let divCurrent = 3;
    while (divCurrent <= divLast) {
        if (num % divCurrent == 0) {
            return false;
        }
        divCurrent += 2;
    }
    return true;
}
