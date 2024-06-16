<script setup lang="ts">

import {Block, BlockType} from "../../../../types/blocks";
import FormText from "../../../atoms/Form/FormText.vue";
import FontSizeSelector from "../FontSizeSelector.vue";
import FontWeightSelector from "../FontWeightSelector.vue";
import FontFamilySelector from "../FontFamilySelector.vue";
import EditorBlock from "../EditorBlock.vue";

interface Props {
    block: Block
}

defineProps<Props>()
defineEmits(['remove:block'])

</script>

<template>
    <EditorBlock v-if="BlockType.PARAGRAPH === block.type"
                 @clone:block="$emit('clone:block', block)"
@remove:block="$emit('remove:block', block)">
        <template #title>Paragraph</template>
        <template #header>
            <FontFamilySelector v-model="block.styles"/>
            <FontWeightSelector v-model="block.styles"/>
            <FontSizeSelector v-model="block.styles"/>
        </template>
        <FormText v-model="block.content"/>
    </EditorBlock>
</template>

<style scoped lang="scss">

</style>
