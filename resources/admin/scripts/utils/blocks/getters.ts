import {
    Bars2Icon,
    Bars3Icon,
    ChatBubbleBottomCenterTextIcon,
    CodeBracketIcon,
    CodeBracketSquareIcon,
    ListBulletIcon,
    PhotoIcon
} from "@heroicons/vue/24/outline";
import {Block, BlockPreview, BlockType} from "../../types/blocks";
import Remark from "../../components/molecules/Editor/Blocks/Remark.vue";
import Code from "../../components/molecules/Editor/Blocks/Code.vue";
import Raw from "../../components/molecules/Editor/Blocks/Raw.vue";
import Paragraph from "../../components/molecules/Editor/Blocks/Paragraph.vue";
import Heading from "../../components/molecules/Editor/Blocks/Heading.vue";
import List from "../../components/molecules/Editor/Blocks/List.vue";
import Image from "../../components/molecules/Editor/Blocks/Image.vue";

export const emptyBlocks: {[k in BlockType]: Block<any, any>} = {
    [BlockType.HEADING]: {
        type: BlockType.HEADING,
        key: '',
        content: '',
        styles: {
            type: undefined,
        },
    },
    [BlockType.PARAGRAPH]: {
        type: BlockType.PARAGRAPH,
        key: '',
        content: '',
        styles: {
            type: undefined,
        },
    },
    [BlockType.LIST]: {
        type: BlockType.LIST,
        key: '',
        content: [],
        styles: {
            type: undefined,
        },
    },
    [BlockType.LIST_ITEM]: {
        type: BlockType.LIST_ITEM,
        key: '',
        content: '',
        styles: {
            type: undefined,
        },
    },
    [BlockType.IMAGE]: {
        type: BlockType.IMAGE,
        key: '',
        content: {
            alt: '',
            src: '',
            caption: '',
        },
        styles: {
            type: undefined,
        },
    },
    [BlockType.RAW]: {
        type: BlockType.RAW,
        key: '',
        content: '',
        styles: {
            type: undefined,
        },
    },
    [BlockType.CODE]: {
        type: BlockType.CODE,
        key: '',
        content: '',
        styles: {
            type: undefined,
        },
    },
    [BlockType.REMARK]: {
        type: BlockType.REMARK,
        key: '',
        content: [],
        styles: {
            type: undefined,
        },
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

export const blockRenderers = {
    [BlockType.HEADING]: Heading,
    [BlockType.PARAGRAPH]: Paragraph,
    [BlockType.LIST]: List,
    [BlockType.IMAGE]: Image,
    [BlockType.RAW]: Raw,
    [BlockType.CODE]: Code,
    [BlockType.REMARK]: Remark,
}
