import {mande, defaults} from "mande";
import {baseUrl} from "../utils/baseUrl";
import {jsonOptions, options} from "./options";
import {setCsrf} from "./csrf";
import {Api} from "../types/api";
import {File} from "../types/data";
import {FileToUpload} from "../types/internals";


type FileResponse = Api<File[]>

const files = mande(baseUrl('admin', 'api', 'v1', 'files'), options)

export async function getFilesList(page: number = 1, type?: string) {
    setCsrf(files)

    return files.get<FileResponse>({
        ...jsonOptions,
        query: {page, type},
    })
}
export async function getImages() {
    setCsrf(files)

    return getFilesList(1, 'images')
}

export async function upload(filesToUpload: FileToUpload[]) {
    setCsrf(files)

    const formData = new FormData();

    for (const fileToUpload of filesToUpload) {
        formData.append('list[][file]', fileToUpload.file)
        formData.append('list[][name]', fileToUpload.name)
    }

    delete defaults.headers['Content-Type']


    return files.post<FileResponse>(formData)
}

export async function remove(hash: string) {
    setCsrf(files)

    return files.delete<FileResponse>(hash, jsonOptions)
}
