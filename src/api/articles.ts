import {mande} from "mande";
import type {APIResponse, PostMeta, PostResource} from "@/types/api";
import {baseUrl} from "@/lib/url";
import {jsonOptions} from "@/api/api";

const articles = mande(baseUrl('app', 'api', 'v1', 'posts'), jsonOptions)

const paginate = async (page: number = 1) => {
    return articles.get<APIResponse<PostResource[]>>({
        query: {page}
    })
}
const getById = async (postId: number) => {
    return articles.get<APIResponse<PostResource, PostMeta>>(postId)
}

const ArticleApi = {
    paginate,
    getById,
}

export default ArticleApi;
