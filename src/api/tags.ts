import {mande} from "mande";
import {baseUrl} from "@/lib/url";
import {jsonOptions} from "@/api/api";
import type {APIResponse, TagResource} from "@/types/api";

const tags = mande(baseUrl('admin', 'api', 'v1', 'tags'), jsonOptions)


const list = async (q: string = '') => {
    return tags.get<APIResponse<TagResource[]>>({
        query: {q}
    })
}

const removeById = async (tagId: number) => {
    return tags.delete<APIResponse<TagResource>>(tagId)
}

const create = async (data: Partial<TagResource>) => {
    return tags.post<APIResponse<TagResource>>(data)
}

const update = async (tagId: number, data: Partial<TagResource>) => {
    return tags.put<APIResponse<TagResource>>(tagId, data)
}


const TagApi = {
    list,
    removeById,
    create,
    update,
}

export default TagApi;


