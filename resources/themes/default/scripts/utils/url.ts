export function baseUrl(...paths: string[]): string {

    const baseUrl = ''

    return `${baseUrl}/${paths.join('/')}`
}
