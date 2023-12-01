import {mande} from "mande";
import {baseUrl} from "../utils/baseUrl";
import {Post} from "../types/data";
import {Api} from "../types/api";
import {options} from "./options";
import {getCsrf} from "./csrf";

const posts = mande(baseUrl('admin', 'api', 'v1', 'posts'), options)

export async function paginate(page: number = 1) {
    await getCsrf(posts)

    return posts.get<Api<Post[]>>({
        query: {page}
    })
}

export async function getById(postId: number) {
    await getCsrf(posts)

    return posts.get<Api<Post>>(postId)
}

export async function changeState(postId: number) {
    await getCsrf(posts)

    return posts.patch<Api<Post>>(`state/${postId}`)
}

export async function removeById(postId: number) {
    await getCsrf(posts)

    return posts.delete<Api<Post>>(postId)
}

export async function create(data: Post) {
    await getCsrf(posts)

    return posts.post<Api<Post>>(data)
}

export async function updateById(postId: number, data: Post) {
    await getCsrf(posts)

    return posts.put<Api<Post>>(postId, data)
}
