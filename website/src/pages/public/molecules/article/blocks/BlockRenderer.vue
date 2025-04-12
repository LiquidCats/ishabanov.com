<script setup lang="ts">
import {BlockTypes} from "@/enums/blocks";
import {PostBlockResource} from "@/types/api";

import CodeBlock from "../../../atoms/blocks/CodeBlock.vue";
import HeadingBlock from "../../../atoms/blocks/HeadingBlock.vue";
import ImageBlock from "../../../atoms/blocks/ImageBlock.vue";
import ListBlock from "../../../atoms/blocks/ListBlock.vue";
import ParagraphBlock from "../../../atoms/blocks/ParagraphBlock.vue";
import RemarkBlock from "../../../atoms/blocks/RemarkBlock.vue";
import RawBlock from "../../../atoms/blocks/RawBlock.vue";
import ListItemBlock from "../../../atoms/blocks/ListItemBlock.vue";

interface Props {
    block: PostBlockResource<any, any>
}

defineProps<Props>()

const renderers = {
    [BlockTypes.heading]: HeadingBlock,
    [BlockTypes.image]: ImageBlock,
    [BlockTypes.list]: ListBlock,
    [BlockTypes.listItem]: ListItemBlock,
    [BlockTypes.paragraph]: ParagraphBlock,
    [BlockTypes.code]: CodeBlock,
    [BlockTypes.remark]: RemarkBlock,
    [BlockTypes.raw]: RawBlock,
}

</script>

<template>
    <component :is="renderers[block.type]"
               :key="block.key"
               v-bind="{
                   blockContent: block.content,
                   blockStyles: block.styles,
               }"/>
</template>
