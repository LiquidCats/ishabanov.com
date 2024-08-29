import {mande} from "mande";
import {baseUrl} from "../utils/url";
import {jsonOptions} from "./api";
import {setCsrf} from "./csrf";
import {APIResponse, HomepageResource} from "../domain/types/api";

const homepage = mande(baseUrl('app', 'api', 'v1', 'homepage'), jsonOptions)

async function load() {
    setCsrf(homepage)

    return homepage.get<APIResponse<HomepageResource>>()
}

const HomepageApi = {
    load
}

export default HomepageApi
