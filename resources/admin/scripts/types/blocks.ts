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

export interface Block<C = string, ST = undefined> {
    type: BlockType
    key: string
    content: C
    styles: {
        type?: ST
    }
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
