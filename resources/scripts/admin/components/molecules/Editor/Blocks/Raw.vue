<script setup lang="ts">

import EditorBlock from "../EditorBlock.vue";
import FormText from "../../../atoms/Form/FormText.vue";
import {Block} from "@kernel/types/blocks";
import {BlockTypes} from "@kernel/enums/blocks";

interface Props {
    block: Block
}

defineProps<Props>()
defineEmits(['clone:block', 'remove:block'])

</script>

<template>
    <EditorBlock v-if="BlockTypes.raw === block.type"
                 @clone:block="$emit('clone:block', block)"
                 @remove:block="$emit('remove:block', block)">
        <template #title>Raw</template>
        <FormText v-model="block.content" />
    </EditorBlock>
</template>

<style scoped lang="scss">

</style>
