import {mande} from "mande";
import {baseUrl} from "../utils/baseUrl";
import {options} from "./options";
import {getCsrf} from "./csrf";
import {ApiResponse} from "../types/ApiResponse";
import {Tag} from "../types/data";

const tags = mande(baseUrl('admin', 'api', 'v1', 'tags'), options)

export async function list(q: string = '') {
    await getCsrf(tags)

    return tags.get<ApiResponse<Tag[]>>({
        query: {q}
    })
}
