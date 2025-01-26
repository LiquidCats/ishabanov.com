import {mande} from "mande";
import {baseUrl} from "../utils/url";
import {jsonOptions} from "./api";
import {setCsrf} from "./csrf";
import {APIResponse, PostMeta, PostResource} from "../domain/types/api";

const posts = mande(baseUrl('app', 'api', 'v1', 'posts'), jsonOptions)

async function paginate(page: number = 1) {
    setCsrf(posts)

    return posts.get<APIResponse<PostResource[]>>({
        query: {page}
    })
}

async function getById(postId: number) {
    setCsrf(posts)

    return posts.get<APIResponse<PostResource, PostMeta>>(postId)
}

const PostApi = {
    paginate,
    getById,
}

export default PostApi
