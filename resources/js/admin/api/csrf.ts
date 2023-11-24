import {mande, MandeInstance} from "mande";
import {getCookie} from "../utils/getCookie";

const csrf = mande('/sanctum/csrf-cookie')


export async function getCsrf(i: MandeInstance) {
    await csrf.get()

    i.options.headers['X-XSRF-TOKEN'] = getCookie('XSRF-TOKEN')
}
