import {ResponseMetaLink} from "../../../../../admin/scripts/types/api";
import {PreviewTypeEnum} from "../enums/preview";
import {ToolLevel, ToolType} from "../enums/tool";
import {BlockTypes, BlockFontFamily, BlockFontWeight, BlockFontSize} from "../enums/blocks";

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
    readonly id: string
    readonly name: string
    readonly type: ToolType
    readonly level: ToolLevel
}

export interface TagResource {
    readonly id: number
    readonly name: string
    readonly slug: string
}

export interface HomepageResource {
    readonly experiences: ExperienceResource[]
    readonly years: number
}

export interface PostResource {
    readonly id: number
    readonly title: string
    readonly preview: string
    readonly is_draft: boolean
    readonly published_at: string
    readonly reading_time: number
    readonly preview_image_type: PreviewTypeEnum
    readonly preview_image_id: number
    readonly blocks: any[]
    readonly tags: Array<TagResource>
    readonly previewImage: FileResource
}

export interface PostBlockResource<C extends any, T = undefined> {
    readonly key: string,
    readonly tag?: T,
    readonly type: BlockTypes
    readonly styles: Array<keyof typeof BlockFontFamily & BlockFontWeight & BlockFontSize>,
    readonly content: C
}

export interface FileResource {
    readonly hash: string
    readonly type: string
    readonly path: string
    readonly extension: string
    readonly name: string
    readonly file_size: number
}

export interface ApiError<T = undefined> {
    readonly data?: T
    readonly message: string
    readonly status: "success"|"fail"|"error"
}

export type ValidationErrors = {
    readonly [key: string]: string[]
}

export interface APIResponse<T extends any> {
    readonly data: T
    readonly links: ResponseLinks
    readonly meta: ResponsePaginationMeta
}

export interface ResponseLinks {
    readonly first?: string
    readonly last?: string
    readonly prev?: string
    readonly next?: string
}

export interface ResponsePaginationMeta {
    readonly current_page: number,
    readonly from: number,
    readonly last_page: number,
    readonly links: ResponseMetaLink[],
    readonly path: string,
    readonly per_page: number,
    readonly to: number,
    readonly total: number
}
