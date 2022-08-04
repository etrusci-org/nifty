/**
 * Get the filename extension by assuming it's the string after the last dot.
 *
 * @param {string} filename  Filename to get the extension from.
 * @returns {string}  Filename extension or original filename if no dot in string.
 */
export function getFileExt(filename: string): string {
    return filename.split('.').pop() || filename
}
