<script setup lang="ts">
import CodeBlock from "../../../atoms/blocks/CodeBlock.vue";
import {BlockFontFamily, BlockFontSize, BlockFontWeight, BlockTypes} from "../../../../domain/enums/blocks";
import HeadingBlock from "../../../atoms/blocks/HeadingBlock.vue";
import ImageBlock from "../../../atoms/blocks/ImageBlock.vue";
import ListBlock from "../../../atoms/blocks/ListBlock.vue";
import ParagraphBlock from "../../../atoms/blocks/ParagraphBlock.vue";
import RemarkBlock from "../../../atoms/blocks/RemarkBlock.vue";
import RawBlock from "../../../atoms/blocks/RawBlock.vue";
import {PostBlockResource} from "../../../../domain/types/api";
import {TextFamily, TextSize, TextWeight} from "../../../../domain/enums/text";
import {computed} from "vue";
import ListItemBlock from "../../../atoms/blocks/ListItemBlock.vue";

interface Props {
    block: PostBlockResource<any>
}

const props = defineProps<Props>()

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

const styles = {
    [BlockFontFamily.sans]: TextFamily.sans,
    [BlockFontFamily.serif]: TextFamily.serif,
    [BlockFontFamily.mono]: TextFamily.mono,
    //
    [BlockFontWeight.thin]: TextWeight.thin,
    [BlockFontWeight.extralight]: TextWeight.extralight,
    [BlockFontWeight.light]: TextWeight.light,
    [BlockFontWeight.normal]: TextWeight.normal,
    [BlockFontWeight.medium]: TextWeight.medium,
    [BlockFontWeight.semibold]: TextWeight.semibold,
    [BlockFontWeight.bold]: TextWeight.bold,
    [BlockFontWeight.extrabold]: TextWeight.extrabold,
    [BlockFontWeight.black]: TextWeight.black,
    //
    [BlockFontSize.xs]: TextSize.xs,
    [BlockFontSize.sm]: TextSize.sm,
    [BlockFontSize.base]: TextSize.base,
    [BlockFontSize.lg]: TextSize.lg,
    [BlockFontSize.xl]: TextSize.xl,
    [BlockFontSize.xl2]: TextSize.xl2,
    [BlockFontSize.xl3]: TextSize.xl3,
    [BlockFontSize.xl4]: TextSize.xl4,
    [BlockFontSize.xl5]: TextSize.xl5,
    [BlockFontSize.xl6]: TextSize.xl6,
    [BlockFontSize.xl7]: TextSize.xl7,
    [BlockFontSize.xl8]: TextSize.xl8,
    [BlockFontSize.xl9]: TextSize.xl9,
}



const blockClasses = computed(() => props.block.styles?.map(s => styles[s] ?? s)?.filter(Boolean)?.join(" ") || "")

</script>

<template>
    <component :is="renderers[block.type]"
               :key="block.key"
               v-memo="[block]"
               v-bind="{
                  tag: props.block?.tag,
                  blockClasses: blockClasses,
                  blockContent: props.block?.content,
              }"/>
</template>
