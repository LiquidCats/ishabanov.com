import {PreviewTypes} from "@/enums/preview";
import {ToolLevel, ToolType} from "@/enums/tool";
import {BlockTypes} from "@/enums/blocks";

export interface ExperienceResource {
    id: number,
    company_url: string,
    company_logo: string,
    position: string,
    company_name: string,
    tools: Array<ToolResource>,
    description: Array<string>,
    started_at: string,
    ended_at: string,
}

export interface ToolResource {
    id: string
    name: string
    type: ToolType
    level: ToolLevel
}

export interface TagResource {
    id: number
    name: string
    slug: string
}

export interface HomepageResource {
    experiences: Array<ExperienceResource>
    years: number
}

export interface PostResource {
    id: number
    title: string
    preview: string
    is_draft: boolean
    published_at: string
    reading_time: number
    preview_image_type: PreviewTypes|null
    preview_image_id: string|null
    blocks: any[]
    tags: Array<TagResource>
    previewImage: FileResource|null
}

export interface PostMeta {
    similar: Array<PostResource>
    previous: PostResource
    next: PostResource
}

export interface PostBlockResource<C extends any, ST = undefined> {
    key: string,
    type: BlockTypes
    styles: {
        type?: ST
    },
    content: C
}

export interface FileResource {
    hash: string
    type: string
    path: string
    extension: string
    name: string
    file_size: number
}

export interface ApiError<T = undefined> {
    data?: T
    message: string
    status: "success"|"fail"|"error"
}

export type ValidationErrors = {
    [key: string]: string[]
}

export interface APIResponse<T extends any, M = ResponsePaginationMeta> {
    data: T
    links: ResponseLinks
    meta: M
}

export interface ResponseLinks {
    first?: string
    last?: string
    prev?: string
    next?: string
}

export interface ResponsePaginationMeta {
    current_page: number,
    from: number,
    last_page: number,
    links: ResponseLinks[],
    path: string,
    per_page: number,
    to: number,
    total: number
}


export interface UserResource {
    id: number
    name: string
    email: string
    is_current_user: boolean
    is_verified: boolean
}


export interface UserRequest {
    name: string
    email: string
    password: string
    password_confirm: string
}

export interface CurrentUserRequest extends UserRequest{
    current_password: string
}

export interface FileToUpload {
    file: File
    preview?: string
    name: string
    extension: string
    uploaded: boolean
}
