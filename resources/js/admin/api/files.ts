import {mande} from "mande";
import {baseUrl} from "../utils/baseUrl";
import {options} from "./options";
import {getCsrf} from "./csrf";
import {ApiResponse} from "../types/ApiResponse";
import {File} from "../types/data";


const files = mande(baseUrl('admin', 'api', 'v1', 'files'), options)

export async function getFilesList() {
    await getCsrf(files)

    return files.get<ApiResponse<File[]>>()
}
export async function getImages() {
    await getCsrf(files)

    return files.get<ApiResponse<File[]>>('images')
}
