import {mande} from "mande";
import {baseUrl} from "@kernel/utils/url";
import {setCsrf} from "@kernel/api/csrf";
import {jsonOptions} from "@kernel/api/api";
import {APIResponse, TagResource} from "../types/api";

const tags = mande(baseUrl('admin', 'api', 'v1', 'tags'), jsonOptions)


const list = async (q: string = '') => {
    setCsrf(tags)

    return tags.get<APIResponse<TagResource[]>>({
        query: {q}
    })
}

const removeById = async (tagId: number) => {
    setCsrf(tags)

    return tags.delete<APIResponse<TagResource>>(tagId)
}

const create = async (data: Partial<TagResource>) => {
    setCsrf(tags)

    return tags.post<APIResponse<TagResource>>(data)
}

const update = async (tagId: number, data: Partial<TagResource>) => {
    setCsrf(tags)

    return tags.put<APIResponse<TagResource>>(tagId, data)
}


const TagApi = {
    list,
    removeById,
    create,
    update,
}

export default TagApi;


