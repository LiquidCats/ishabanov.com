import {mande} from "mande";
import {baseUrl} from "../utils/baseUrl";
import {Post} from "../types/data";
import {ApiResponse} from "../types/ApiResponse";
import {options} from "./options";
import {getCsrf} from "./csrf";
import {getCookie} from "../utils/getCookie";

const posts = mande(baseUrl('admin', 'api', 'v1', 'posts'), options)

export async function getPosts(page: number = 1) {
    await getCsrf(posts)

    return posts.get<ApiResponse<Post[]>>({
        query: {page}
    })
}

export async function getPost(postId: number) {
    await getCsrf(posts)

    return posts.get<ApiResponse<Post>>(postId)
}

export async function changePostState(postId: number) {
    await getCsrf(posts)

    return posts.patch<ApiResponse<Post>>(`state/${postId}`, {
        headers: {
            'X-XSRF-TOKEN': getCookie('XSRF-TOKEN'),
        }
    })
}

export async function removePost(postId: number) {
    await getCsrf(posts)

    return posts.delete<ApiResponse<Post>>(postId, {
        headers: {
            'X-XSRF-TOKEN': getCookie('XSRF-TOKEN'),
        }
    })
}
