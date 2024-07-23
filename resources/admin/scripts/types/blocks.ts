import {BlockStyle} from "./style";
import {FunctionalComponent, HTMLAttributes, VNodeProps} from "vue";

export enum BlockType {
    HEADING = 'heading',
    IMAGE = 'image',
    LIST = 'list',
    LIST_ITEM = 'list-item',
    PARAGRAPH = 'paragraph',
    CODE = 'code',
    REMARK = 'remark',
    RAW = 'raw',
}

export interface Block<C = string, T = undefined> {
    type: BlockType
    key: string
    content: C
    tag: T
    styles: Array<keyof typeof BlockStyle>
}

export interface BlockPreview {
    type: BlockType
    name: string
    icon: FunctionalComponent<HTMLAttributes & VNodeProps>
}

export type ImageContent = {
    src: string,
    alt: string,
    caption: string,
}
