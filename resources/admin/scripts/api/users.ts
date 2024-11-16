import {mande} from "mande";
import {baseUrl} from "../utils/baseUrl";
import {Post, UserResource} from "../types/data";
import {Api, ApiError, ValidationErrors} from "../types/api";
import {jsonOptions} from "./options";
import {setCsrf} from "./csrf";

const users = mande(baseUrl('admin', 'api', 'v1', 'users'), jsonOptions)

async function paginate(page: number = 1) {
    setCsrf(users)

    return users.get<Api<UserResource[]>>({
        query: {page}
    })
}

async function get(userId: number) {
    setCsrf(users)

    return users.get<Api<UserResource>>(userId)
}

async function create(data: UserResource) {
    setCsrf(users)

    return users.post<Api<Post> | ApiError<ValidationErrors>>(data)
}

const UserApi = {
    paginate,
    get,
    create,
}

export default UserApi
