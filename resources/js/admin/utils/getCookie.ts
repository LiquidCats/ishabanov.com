let cookie: {[key: string]: string} = {};

export function getCookie(key: string): string {


        for (const el of document.cookie.split(';')) {
             let [key, value] = el.split('=');
             cookie[key.trim()] = value;
        }

        return cookie[key];
}
