import {mande} from "mande";
import {baseUrl} from "../utils/baseUrl";
import {options} from "./options";
import {getCsrf} from "./csrf";
import {ApiResponse} from "../types/ApiResponse";
import {File} from "../types/data";


const files = mande(baseUrl('admin', 'api', 'v1', 'files'), options)

export async function getFilesList(page: number = 1, type?: string) {
    await getCsrf(files)

    return files.get<ApiResponse<File[]>>({
        query: {page, type}
    })
}
export async function getImages() {
    await getCsrf(files)

    return getFilesList(1, 'images')
}
