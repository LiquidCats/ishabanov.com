import {mande} from "mande";
import {baseUrl} from "@kernel/utils/url";
import {jsonOptions} from "@kernel/api/api";
import {setCsrf} from "@kernel/api/csrf";
import {APIResponse, PostResource, ApiError, ValidationErrors} from "@kernel/types/api";

const posts = mande(baseUrl('admin', 'api', 'v1', 'posts'), jsonOptions)

const paginate = async  (page: number = 1) => {
    setCsrf(posts)

    return posts.get<APIResponse<PostResource[]>>({
        query: {page}
    })
}
const getById = async (postId: number) => {
    setCsrf(posts)

    return posts.get<APIResponse<PostResource>>(postId)
}
const changeState = async (postId: number) => {
    setCsrf(posts)

    return posts.patch<APIResponse<PostResource>>(`state/${postId}`)
}
const removeById = async (postId: number) => {
    setCsrf(posts)

    return posts.delete<APIResponse<PostResource>>(postId)
}
const create = async (data: PostResource) => {
    setCsrf(posts)

    return posts.post<APIResponse<PostResource> | ApiError<ValidationErrors>>(data)
}
const updateById = async (postId: number, data: PostResource) => {
    setCsrf(posts)

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
