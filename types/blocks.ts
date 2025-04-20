import  type {FunctionalComponent, HTMLAttributes, VNodeProps} from "vue";
import {BlockTypes} from "~/enums/blocks";

export interface Block<C = string, ST = undefined> {
    type: BlockTypes
    key: string
    content: C
    styles: {
        type?: ST
    }
}

export interface BlockPreview {
    type: BlockTypes
    name: string
    icon: FunctionalComponent<HTMLAttributes & VNodeProps>
}

export type ImageContent = {
    src: string,
    alt: string,
    caption: string,
}
