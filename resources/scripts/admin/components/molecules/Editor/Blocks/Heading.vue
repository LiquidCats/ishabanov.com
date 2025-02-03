<script setup lang="ts">

import {Block} from "@kernel/types/blocks";
import {BlockTypes, HeadingStyleType} from "@kernel/enums/blocks";
import EditorBlock from "../EditorBlock.vue";
import FormField from "../../../atoms/Form/FormField.vue";
import HeadingTypeSelector from "../Selectors/HeadingTypeSelector.vue";

interface Props {
    block: Block<string, HeadingStyleType>
}

defineProps<Props>()
defineEmits(['remove:block', 'clone:block'])

</script>

<template>
    <EditorBlock v-if="BlockTypes.heading === block.type"
                 @clone:block="$emit('clone:block', block)"
                 @remove:block="$emit('remove:block', block)">
        <template #title>Heading</template>
        <template #header>
            <HeadingTypeSelector v-model="block.styles.type" />
        </template>
        <FormField v-model="block.content"/>
    </EditorBlock>
</template>

<style scoped lang="scss">

</style>
