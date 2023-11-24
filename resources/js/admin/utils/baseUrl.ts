export function baseUrl(...paths: string[]): string {

    const baseUrl = import.meta.env.VITE_APP_URL
    
    return `${baseUrl}/${paths.join('/')}`
}
