import {mande} from "mande";
import {baseUrl} from "@/lib/url";
import {jsonOptions} from "@/api/api";
import type {APIResponse, PostResource, ApiError, ValidationErrors} from "@/types/api";

const posts = mande(baseUrl('admin', 'api', 'v1', 'posts'), jsonOptions)

const paginate = async  (page: number = 1) => {
    return posts.get<APIResponse<PostResource[]>>({
        query: {page}
    })
}
const getById = async (postId: number) => {
    return posts.get<APIResponse<PostResource>>(postId)
}
const changeState = async (postId: number) => {
    return posts.patch<APIResponse<PostResource>>(`state/${postId}`)
}
const removeById = async (postId: number) => {
    return posts.delete<APIResponse<PostResource>>(postId)
}
const create = async (data: PostResource) => {
    return posts.post<APIResponse<PostResource> | ApiError<ValidationErrors>>(data)
}
const updateById = async (postId: number, data: PostResource) => {
    return posts.put<APIResponse<PostResource> | ApiError<ValidationErrors>>(postId, data)
}

const PostApi = {
    paginate,
    getById,
    changeState,
    removeById,
    create,
    updateById,
}

export default PostApi
