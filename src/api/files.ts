import {mande, defaults} from "mande";
import {baseUrl} from "@/lib/url";
import {jsonOptions} from "@/api/api";
import type {APIResponse, FileResource, FileToUpload} from "@/types/api";

type FileResponse = APIResponse<FileResource[]>

const files = mande(baseUrl('admin', 'api', 'v1', 'files'), jsonOptions)

const getFilesList = async (page: number = 1, type?: string) => {

    return files.get<FileResponse>({
        ...jsonOptions,
        query: {page, type},
    } as any);
}

const getImages = async () => {
    return getFilesList(1, 'images')
}

const upload = async (filesToUpload: FileToUpload[]) => {
    const formData = new FormData();

    for (const fileToUpload of filesToUpload) {
        formData.append('list[][file]', fileToUpload?.file)
        formData.append('list[][name]', fileToUpload?.name)
    }

    delete defaults.headers['Content-Type']


    return files.post<FileResponse>(formData)
}

const remove = async (hash: string) =>  {
    return files.delete<FileResponse>(hash, jsonOptions as any)
}

const FileApi = {
    getFilesList,
    getImages,
    upload,
    remove,
}

export default FileApi
