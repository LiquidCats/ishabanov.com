import {mande} from "mande";
import {baseUrl} from "../utils/baseUrl";
import {Post} from "../types/data";
import {Api, ApiError, ValidationErrors} from "../types/api";
import {jsonOptions} from "./options";
import {setCsrf} from "./csrf";

const posts = mande(baseUrl('admin', 'api', 'v1', 'posts'), jsonOptions)

export async function paginate(page: number = 1) {
    setCsrf(posts)

    return posts.get<Api<Post[]>>({
        query: {page}
    })
}

export async function getById(postId: number) {
    setCsrf(posts)

    return posts.get<Api<Post>>(postId)
}

export async function changeState(postId: number) {
    setCsrf(posts)

    return posts.patch<Api<Post>>(`state/${postId}`)
}

export async function removeById(postId: number) {
    setCsrf(posts)

    return posts.delete<Api<Post>>(postId)
}

export async function create(data: Post) {
    setCsrf(posts)

    return posts.post<Api<Post> | ApiError<ValidationErrors>>(data)
}

export async function updateById(postId: number, data: Post) {
    setCsrf(posts)

    return posts.put<Api<Post> | ApiError<ValidationErrors>>(postId, data)
}
