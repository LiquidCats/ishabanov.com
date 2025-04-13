import {mande} from "mande";
import {baseUrl} from "@/lib/url";
import {jsonOptions} from  "@/api/api";
import type {
    APIResponse,
    ApiError,
    ValidationErrors,
    UserResource,
} from "@/types/api";

const users = mande(baseUrl('admin', 'api', 'v1', 'users'), jsonOptions)

const paginate = async (page: number = 1) => {

    return users.get<APIResponse<UserResource[]>>({
        query: {page}
    })
}
const get = async (userId: number) => {
    return users.get<APIResponse<UserResource>>(userId)
}
const create = async <T>(data: T) => {
    return users.post<APIResponse<UserResource> & ApiError<ValidationErrors>>(data)
}
const remove = async (userId: number) => {
    return users.delete<APIResponse<UserResource>>(userId)
}
const verify = async (userId: number) => {
    return users.post<APIResponse<UserResource>>(`verify/${userId}`)
}
const updateInfo = async (userId: number) => {
    return users.put<APIResponse<UserResource>>(userId)
}
const updatePassword = async (userId: number, data: object) => {
    return users.put<APIResponse<UserResource>>(`password/${userId}`, data)
}

const UserApi = {
    paginate,
    get,
    create,
    remove,
    verify,
    updateInfo,
    updatePassword,
}

export default UserApi
