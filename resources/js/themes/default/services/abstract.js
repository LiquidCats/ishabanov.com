export default class AbstractService {
    static #getBase() {
        if (import.meta.env.DEV) {
            return 'http://localhost:8000/api';
        }
        return 'https://liquid-cats.com/api'
    }

    /**
     * @protected
     * @param {string|null} uri
     */
    static _getUrl(uri= null) {
        return `${AbstractService.#getBase()}/${uri}`
    }
}
