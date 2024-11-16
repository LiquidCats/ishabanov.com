import {Block} from "./blocks";

export interface Post {
    id: number;
    title: string;
    preview: string;
    preview_image_type: null|PreviewTypes;
    preview_image_id: null|string;
    content: string;
    is_draft: boolean;
    published_at: string;
    reading_time: number;
    tags: Tag[];
    previewImage: File|null;
    blocks: Array<Block>
}

export interface Tag {
    id: number;
    name: string;
    slug: string;
}

export interface File {
    hash: string;
    type: string;
    path: string;
    extension: string;
    name: string;
    file_size: number;
    created_at: string;
    updated_at: string;
}

export enum PreviewTypes {
    LEFT_SIDE = "left_side",
    FILL = "fill",
}

export interface UserResource {
    readonly id: number
    readonly name: string
    readonly email: string
    readonly is_current_user: boolean
    readonly is_verified: boolean
}
