import {mande, MandeInstance} from "mande";
import {getCookie} from "@kernel/utils/cookie";
import {jsonOptions} from "@kernel/api/api";
import {baseUrl} from "@kernel/utils/url";

const request = mande(baseUrl('sanctum', 'csrf-cookie'), jsonOptions)

export const setCsrf = (i: MandeInstance) => {
    let csrf = getCookie('XSRF-TOKEN')
    if (!csrf) {
        requestCsrf().catch((err) => console.error(err))
        csrf = getCookie('XSRF-TOKEN')
    }

    i.options.headers['X-XSRF-TOKEN'] = csrf
}

const requestCsrf = async (): Promise<void> => {
    await request.get()
}
