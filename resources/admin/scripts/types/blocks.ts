import {BlockStyle} from "./style";
import {
    CodeBracketSquareIcon,
    Bars3Icon,
    Bars2Icon,
    PhotoIcon,
    ListBulletIcon,
    CodeBracketIcon,
    ChatBubbleBottomCenterTextIcon
} from "@heroicons/vue/24/outline";
import Heading from "../components/molecules/Editor/Blocks/Heading.vue";
import Paragraph from "../components/molecules/Editor/Blocks/Paragraph.vue";
import List from "../components/molecules/Editor/Blocks/List.vue";
import Image from "../components/molecules/Editor/Blocks/Image.vue";
import Code from "../components/molecules/Editor/Blocks/Code.vue";
import Raw from "../components/molecules/Editor/Blocks/Raw.vue";
import Remark from "../components/molecules/Editor/Blocks/Remark.vue";
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

export const blockRenderers = {
    [BlockType.HEADING]: Heading,
    [BlockType.PARAGRAPH]: Paragraph,
    [BlockType.LIST]: List,
    [BlockType.IMAGE]: Image,
    [BlockType.RAW]: Raw,
    [BlockType.CODE]: Code,
    [BlockType.REMARK]: Remark,
}

export interface Block<C = string, T = undefined> {
    type: BlockType
    content: C
    tag: T
    styles: Array<keyof typeof BlockStyle>
}

export interface BlockPreview {
    type: BlockType
    name: string
    icon: FunctionalComponent<HTMLAttributes & VNodeProps>
}

export type WithId<T = number> = {id: T}

export type BlockWithId<C = string, T = undefined> = Block<C, T> & WithId

export type ImageContent = {
    src: string,
    alt: string,
    caption: string,
}

export const emptyBlocks: {[k in BlockType]: Block<any, any>} = {
    [BlockType.HEADING]: {
        type: BlockType.HEADING,
        tag: 'h1',
        content: '',
        styles: [],
    },
    [BlockType.PARAGRAPH]: {
        type: BlockType.PARAGRAPH,
        tag: undefined,
        content: '',
        styles: [] as any[],
    },
    [BlockType.LIST]: {
        type: BlockType.LIST,
        tag: 'ul',
        content: [],
        styles: [],
    },
    [BlockType.LIST_ITEM]: {
        type: BlockType.LIST_ITEM,
        tag: undefined,
        content: '',
        styles: [],
    },
    [BlockType.IMAGE]: {
        type: BlockType.IMAGE,
        tag: undefined,
        content: {
            alt: '',
            src: '',
            caption: '',
        },
        styles: [],
    },
    [BlockType.RAW]: {
        type: BlockType.RAW,
        tag: undefined,
        content: '',
        styles: undefined
    },
    [BlockType.CODE]: {
        type: BlockType.CODE,
        tag: undefined,
        content: '',
        styles: [],
    },
    [BlockType.REMARK]: {
        type: BlockType.REMARK,
        tag: undefined,
        content: [],
        styles: undefined
    },
}

export const blockPreviews: Array<BlockPreview> = [
    {
        type: BlockType.HEADING,
        name: 'Heading',
        icon: Bars2Icon
    },
    {
        type: BlockType.IMAGE,
        name: 'Image',
        icon: PhotoIcon
    },
    {
        type: BlockType.LIST,
        name: 'List',
        icon: ListBulletIcon
    },
    {
        type: BlockType.PARAGRAPH,
        name: 'Paragraph',
        icon: Bars3Icon
    },
    {
        type: BlockType.CODE,
        name: 'Code',
        icon: CodeBracketSquareIcon
    },
    {
        type: BlockType.REMARK,
        name: 'Remark',
        icon: ChatBubbleBottomCenterTextIcon
    },
    {
        type: BlockType.RAW,
        name: 'Raw',
        icon: CodeBracketIcon
    },
];
