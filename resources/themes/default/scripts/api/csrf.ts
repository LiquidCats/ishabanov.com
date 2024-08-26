import {mande, MandeInstance} from "mande";
import {getCookie} from "../utils/cookie";
import {jsonOptions} from "./api";
import {baseUrl} from "../utils/url";

const request = mande(baseUrl('sanctum', 'csrf-cookie'), jsonOptions)

export function setCsrf(i: MandeInstance) {
    let csrf = getCookie('XSRF-TOKEN')
    if (!csrf) {
        requestCsrf().catch((err) => console.error(err))
        csrf = getCookie('XSRF-TOKEN')
    }

    i.options.headers['X-XSRF-TOKEN'] = csrf
}

async function requestCsrf(): Promise<void> {
    await request.get()
}
