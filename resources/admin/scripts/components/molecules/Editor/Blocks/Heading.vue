<script setup lang="ts">

import {Block, BlockType, } from "../../../../types/blocks";
import {HeadingTag, headingTags} from "../../../../types/tags";
import EditorBlock from "../EditorBlock.vue";
import FormField from "../../../atoms/Form/FormField.vue";
import FontSizeSelector from "../FontSizeSelector.vue";
import FontWeightSelector from "../FontWeightSelector.vue";
import FontFamilySelector from "../FontFamilySelector.vue";
import TagSelector from "../TagSelector.vue";

interface Props {
    block: Block<string, HeadingTag>
}

defineProps<Props>()
defineEmits(['remove:block', 'clone:block'])

</script>

<template>
    <EditorBlock v-if="BlockType.HEADING === block.type"
                 @clone:block="$emit('clone:block', block)"
                 @remove:block="$emit('remove:block', block)">
        <template #title>Heading</template>
        <template #header>
            <TagSelector v-model="block.tag" :values="headingTags"/>
            <FontFamilySelector v-model="block.styles"/>
            <FontWeightSelector v-model="block.styles"/>
            <FontSizeSelector v-model="block.styles"/>
        </template>
        <FormField v-model="block.content"/>
    </EditorBlock>
</template>

<style scoped lang="scss">

</style>
