import {mande, MandeInstance} from "mande";
import {getCookie} from "../utils/getCookie";
import {baseUrl} from "../utils/baseUrl";
import {jsonOptions, options} from "./options";

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
