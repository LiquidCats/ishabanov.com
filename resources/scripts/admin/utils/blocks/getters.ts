import {
    Bars2Icon,
    Bars3Icon,
    ChatBubbleBottomCenterTextIcon,
    CodeBracketIcon,
    CodeBracketSquareIcon,
    ListBulletIcon,
    PhotoIcon
} from "@heroicons/vue/24/outline";
import {BlockTypes} from "@kernel/enums/blocks";
import {Block, BlockPreview} from "@kernel/types/blocks";
// @ts-ignore
import Remark from "@admin/components/molecules/Editor/Blocks/Remark.vue";
// @ts-ignore
import Code from "@admin/components/molecules/Editor/Blocks/Code.vue";
// @ts-ignore
import Raw from "@admin/components/molecules/Editor/Blocks/Raw.vue";
// @ts-ignore
import Paragraph from "@admin/components/molecules/Editor/Blocks/Paragraph.vue";
// @ts-ignore
import Heading from "@admin/components/molecules/Editor/Blocks/Heading.vue";
// @ts-ignore
import List from "@admin/components/molecules/Editor/Blocks/List.vue";
// @ts-ignore
import Image from "@admin/components/molecules/Editor/Blocks/Image.vue";

export const emptyBlocks: {[k in BlockTypes]: Block<any, any>} = {
    [BlockTypes.heading]: {
        type: BlockTypes.heading,
        key: '',
        content: '',
        styles: {
            type: undefined,
        },
    },
    [BlockTypes.paragraph]: {
        type: BlockTypes.paragraph,
        key: '',
        content: '',
        styles: {
            type: undefined,
        },
    },
    [BlockTypes.list]: {
        type: BlockTypes.list,
        key: '',
        content: [],
        styles: {
            type: undefined,
        },
    },
    [BlockTypes.listItem]: {
        type: BlockTypes.listItem,
        key: '',
        content: '',
        styles: {
            type: undefined,
        },
    },
    [BlockTypes.image]: {
        type: BlockTypes.image,
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
    [BlockTypes.raw]: {
        type: BlockTypes.raw,
        key: '',
        content: '',
        styles: {
            type: undefined,
        },
    },
    [BlockTypes.code]: {
        type: BlockTypes.code,
        key: '',
        content: '',
        styles: {
            type: undefined,
        },
    },
    [BlockTypes.remark]: {
        type: BlockTypes.remark,
        key: '',
        content: [],
        styles: {
            type: undefined,
        },
    },
}

export const blockPreviews: Array<BlockPreview> = [
    {
        type: BlockTypes.heading,
        name: 'Heading',
        icon: Bars2Icon
    },
    {
        type: BlockTypes.image,
        name: 'Image',
        icon: PhotoIcon
    },
    {
        type: BlockTypes.list,
        name: 'List',
        icon: ListBulletIcon
    },
    {
        type: BlockTypes.paragraph,
        name: 'Paragraph',
        icon: Bars3Icon
    },
    {
        type: BlockTypes.code,
        name: 'Code',
        icon: CodeBracketSquareIcon
    },
    {
        type: BlockTypes.remark,
        name: 'Remark',
        icon: ChatBubbleBottomCenterTextIcon
    },
    {
        type: BlockTypes.raw,
        name: 'Raw',
        icon: CodeBracketIcon
    },
];

export const blockRenderers = {
    [BlockTypes.heading]: Heading,
    [BlockTypes.paragraph]: Paragraph,
    [BlockTypes.list]: List,
    [BlockTypes.image]: Image,
    [BlockTypes.raw]: Raw,
    [BlockTypes.code]: Code,
    [BlockTypes.remark]: Remark,
}
