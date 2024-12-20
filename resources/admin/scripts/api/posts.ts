import {mande} from "mande";
import {baseUrl} from "../utils/baseUrl";
import {Post} from "../types/data";
import {Api, ApiError, ValidationErrors} from "../types/api";
import {jsonOptions} from "./options";
import {setCsrf} from "./csrf";

const posts = mande(baseUrl('admin', 'api', 'v1', 'posts'), jsonOptions)

const PostApi = {
    paginate: async  (page: number = 1) => {
        setCsrf(posts)

        return posts.get<Api<Post[]>>({
            query: {page}
        })
    },
    getById: async (postId: number) => {
        setCsrf(posts)

        return posts.get<Api<Post>>(postId)
    },
    changeState: async (postId: number) => {
        setCsrf(posts)

        return posts.patch<Api<Post>>(`state/${postId}`)
    },
    removeById: async (postId: number) => {
        setCsrf(posts)

        return posts.delete<Api<Post>>(postId)
    },
    create: async (data: Post) => {
        setCsrf(posts)

        return posts.post<Api<Post> | ApiError<ValidationErrors>>(data)
    },
    updateById: async (postId: number, data: Post) => {
        setCsrf(posts)

        return posts.put<Api<Post> | ApiError<ValidationErrors>>(postId, data)
    },
}

export default PostApi
