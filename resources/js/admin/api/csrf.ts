import {MandeInstance} from "mande";
import {getCookie} from "../utils/getCookie";

export function setCsrf(i: MandeInstance) {
    i.options.headers['X-XSRF-TOKEN'] = getCookie('XSRF-TOKEN')
}
