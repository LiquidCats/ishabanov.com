import {mande} from "mande";
import {baseUrl} from "@kernel/utils/url";
import {jsonOptions} from  "@kernel/api/api";
import {setCsrf} from "@kernel/api/csrf";
import {
    APIResponse,
    ApiError,
    ValidationErrors,
    UserResource,
} from "@kernel/types/api";

const users = mande(baseUrl('admin', 'api', 'v1', 'users'), jsonOptions)

const paginate = async (page: number = 1) => {
    setCsrf(users)

    return users.get<APIResponse<UserResource[]>>({
        query: {page}
    })
}
const get = async (userId: number) => {
    setCsrf(users)

    return users.get<APIResponse<UserResource>>(userId)
}
const create = async <T>(data: T) => {
    setCsrf(users)

    return users.post<APIResponse<UserResource> & ApiError<ValidationErrors>>(data)
}
const remove = async (userId: number) => {
    setCsrf(users)

    return users.delete<APIResponse<UserResource>>(userId)
}
const verify = async (userId: number) => {
    setCsrf(users)

    return users.post<APIResponse<UserResource>>(`verify/${userId}`)
}
const updateInfo = async (userId: number, data: object) => {
    setCsrf(users)

    return users.put<APIResponse<UserResource>>(userId)
}
const updatePassword = async (userId: number, data: object) => {
    setCsrf(users)

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
