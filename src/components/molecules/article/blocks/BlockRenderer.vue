<script setup lang="ts">
import {BlockTypes} from "@/enums/blocks";
import type {PostBlockResource} from "@/types/api";
//
import CodeBlock from "@/components/atoms/blocks/CodeBlock.vue";
import HeadingBlock from "@/components/atoms/blocks/HeadingBlock.vue";
import ImageBlock from "@/components/atoms/blocks/ImageBlock.vue";
import ListBlock from "@/components/atoms/blocks/ListBlock.vue";
import ParagraphBlock from "@/components/atoms/blocks/ParagraphBlock.vue";
import RemarkBlock from "@/components/atoms/blocks/RemarkBlock.vue";
import RawBlock from "@/components/atoms/blocks/RawBlock.vue";
import ListItemBlock from "@/components/atoms/blocks/ListItemBlock.vue";

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
