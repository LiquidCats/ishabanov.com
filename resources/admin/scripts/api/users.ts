import {mande} from "mande";
import {baseUrl} from "../utils/baseUrl";
import {Post, UserResource} from "../types/data";
import {Api, ApiError, ValidationErrors} from "../types/api";
import {jsonOptions} from "./options";
import {setCsrf} from "./csrf";

const users = mande(baseUrl('admin', 'api', 'v1', 'users'), jsonOptions)

const UserApi = {
    paginate: async (page: number = 1) => {
        setCsrf(users)

        return users.get<Api<UserResource[]>>({
            query: {page}
        })
    },
    get: async (userId: number) => {
        setCsrf(users)

        return users.get<Api<UserResource>>(userId)
    },
    create: async (data: any) => {
        setCsrf(users)

        return users.post<Api<Post> | ApiError<ValidationErrors>>(data)
    },
    remove: async (userId: number) => {
        setCsrf(users)

        return users.delete<Api<UserResource>>(userId)
    },
    verify: async (userId: number) => {
        setCsrf(users)

        return users.post<Api<UserResource>>(`${userId}/verify`)
    },
}

export default UserApi
