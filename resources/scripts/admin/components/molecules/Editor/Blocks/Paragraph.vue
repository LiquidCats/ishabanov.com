<script setup lang="ts">

import {Block} from "@kernel/types/blocks";
import {BlockTypes, ParagraphStyleType} from "@kernel/enums/blocks";
import FormText from "../../../atoms/Form/FormText.vue";
import EditorBlock from "../EditorBlock.vue";
import ParagraphTypeSelector from "../Selectors/ParagraphTypeSelector.vue";

interface Props {
    block: Block<string, ParagraphStyleType>;
}

defineProps<Props>()
defineEmits(['remove:block', 'clone:block'])

</script>

<template>
    <EditorBlock v-if="BlockTypes.paragraph === block.type"
                 @clone:block="$emit('clone:block', block)"
                 @remove:block="$emit('remove:block', block)">
        <template #title>Paragraph</template>
        <template #header>
            <ParagraphTypeSelector v-model="block.styles.type"/>
        </template>
        <FormText v-model="block.content"/>
    </EditorBlock>
</template>

<style scoped lang="scss">

</style>
