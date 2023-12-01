import {mande} from "mande";
import {baseUrl} from "../utils/baseUrl";
import {options} from "./options";
import {getCsrf} from "./csrf";
import {Api} from "../types/api";
import {Tag} from "../types/data";

const tags = mande(baseUrl('admin', 'api', 'v1', 'tags'), options)

export async function list(q: string = '') {
    await getCsrf(tags)

    return tags.get<Api<Tag[]>>({
        query: {q}
    })
}

export async function removeById(tagId: number) {
    await getCsrf(tags)

    return tags.delete<Api<Tag>>(tagId)
}

export async function create(data: Partial<Tag>) {
    await getCsrf(tags)

    return tags.post<Api<Tag>>(data)
}

export async function update(tagId: number, data: Partial<Tag>) {
    await getCsrf(tags)

    return tags.put<Api<Tag>>(tagId, data)
}
