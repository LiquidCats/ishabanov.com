import {mande, defaults} from "mande";
import {baseUrl} from "@kernel/utils/url";
import {jsonOptions} from "@kernel/api/api";
import {APIResponse, FileResource, FileToUpload} from "@kernel/types/api";
import {setCsrf} from "@kernel/api/csrf";

type FileResponse = APIResponse<FileResource[]>

const files = mande(baseUrl('admin', 'api', 'v1', 'files'), jsonOptions)

const getFilesList = async (page: number = 1, type?: string) => {
    setCsrf(files)

    return files.get<FileResponse>({
        ...jsonOptions,
        query: {page, type},
    } as any);
}

const getImages = async () => {
    setCsrf(files)

    return getFilesList(1, 'images')
}

const upload = async (filesToUpload: FileToUpload[]) => {
    setCsrf(files)

    const formData = new FormData();

    for (const fileToUpload of filesToUpload) {
        formData.append('list[][file]', fileToUpload?.file)
        formData.append('list[][name]', fileToUpload?.name)
    }

    delete defaults.headers['Content-Type']


    return files.post<FileResponse>(formData)
}

const remove = async (hash: string) =>  {
    setCsrf(files)

    return files.delete<FileResponse>(hash, jsonOptions as any)
}

const FileApi = {
    getFilesList,
    getImages,
    upload,
    remove,
}

export default FileApi
