import {mande} from "mande";
import {APIResponse, PostMeta, PostResource} from "@kernel/types/api";
import {baseUrl} from "@kernel/utils/url";
import {jsonOptions} from "@kernel/api/api";
import {setCsrf} from "@kernel/api/csrf";

const articles = mande(baseUrl('app', 'api', 'v1', 'posts'), jsonOptions)

const paginate = async (page: number = 1) => {
    setCsrf(articles)

    return articles.get<APIResponse<PostResource[]>>({
        query: {page}
    })
}
const getById = async (postId: number) => {
    setCsrf(articles)

    return articles.get<APIResponse<PostResource, PostMeta>>(postId)
}

const ArticleApi = {
    paginate,
    getById,
}

export default ArticleApi;
