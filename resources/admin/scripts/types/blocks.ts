import {BlockStyle} from "./style";
import {CodeBracketSquareIcon, Bars3Icon, Bars2Icon, PhotoIcon, ListBulletIcon, CodeBracketIcon, ChatBubbleBottomCenterTextIcon} from "@heroicons/vue/24/outline";
import Heading from "../components/molecules/Editor/Blocks/Heading.vue";
import Paragraph from "../components/molecules/Editor/Blocks/Paragraph.vue";
import List from "../components/molecules/Editor/Blocks/List.vue";
import Image from "../components/molecules/Editor/Blocks/Image.vue";
import Raw from "../components/molecules/Editor/Blocks/Raw.vue";
import Code from "../components/molecules/Editor/Blocks/Code.vue";
import Remark from "../components/molecules/Editor/Blocks/Remark.vue";

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

export const blockTypes = [
    BlockType.HEADING,
    BlockType.IMAGE,
    BlockType.LIST,
    BlockType.PARAGRAPH,
    BlockType.CODE,
    BlockType.RAW,
    BlockType.REMARK,
]

export const blockRenderers = {
    [BlockType.HEADING]: Heading,
    [BlockType.PARAGRAPH]: Paragraph,
    [BlockType.LIST]: List,
    [BlockType.IMAGE]: Image,
    [BlockType.RAW]: Raw,
    [BlockType.CODE]: Code,
    [BlockType.REMARK]: Remark,
}

export const blocks = [
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

export enum ListTag {
    UL = "ul",
    OL = "ol",
}

export enum HeadingTag {
    H1 = "h1",
    H2 = "h2",
    H3 = "h3",
    H4 = "h4",
    H5 = "h5",
    H6 = "h6",
}

export enum CodeLanguage {
    JAVASCRIPT = 'javascript',
    BASH = 'bash',
    CSS = 'css',
    DOCKERFILE = 'dockerfile',
    GO = 'go',
    GRAPHQL = 'graphql',
    JSON = 'json',
    MARKDOWN = 'markdown',
    NGINX = 'nginx',
    PHP = 'php',
    PLAINTEXT = 'plaintext',
    SCSS = 'scss',
    SQL = 'sql',
    TYPESCRIPT = 'typescript',
    XML = 'xml',
    YAML = 'yaml',
}

export const codeLanguages: CodeLanguage[] = Object.values(CodeLanguage)

export type Blocks = Block[]

export interface Block<C = string, T = undefined> {
    type: BlockType
    content: C
    tag: T
    styles: Array<BlockStyle>
}

export type ImageContent = {
    src: string,
    alt: string,
    caption: string,
}
export const listTags: ListTag[] = Object.values(ListTag);
export const headingTags: HeadingTag[] = Object.values(HeadingTag)


