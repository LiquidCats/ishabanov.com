import {mande} from "mande";
import {baseUrl} from "../utils/baseUrl";
import {Post} from "../types/data";
import {ApiResponse} from "../types/ApiResponse";
import {options} from "./options";
import {getCsrf} from "./csrf";
import {getCookie} from "../utils/getCookie";

const posts = mande(baseUrl('admin', 'api', 'v1', 'posts'), options)

export async function paginate(page: number = 1) {
    await getCsrf(posts)

    return posts.get<ApiResponse<Post[]>>({
        query: {page}
    })
}

export async function getById(postId: number) {
    await getCsrf(posts)

    return posts.get<ApiResponse<Post>>(postId)
}

export async function changeState(postId: number) {
    await getCsrf(posts)

    return posts.patch<ApiResponse<Post>>(`state/${postId}`)
}

export async function removeById(postId: number) {
    await getCsrf(posts)

    return posts.delete<ApiResponse<Post>>(postId)
}

export async function create(data: Post) {
    await getCsrf(posts)

    return posts.post<ApiResponse<Post>>(data)
}

export async function updateById(postId: number, data: Post) {
    await getCsrf(posts)

    return posts.put<ApiResponse<Post>>(postId, data)
}
