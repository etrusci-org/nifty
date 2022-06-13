/**
 * Get the filename extension by naively assuming it's the string after the last dot.
 *
 * @param {string} filename  Filename to get the extension from.
 * @returns {string}  Filename extension or original filename if no dot in string.
 */
export function fileExt(filename: string): string {
    let ext = filename.split('.').pop()
    return ext || filename
}
