<script setup lang="ts">

import EditorBlock from "../EditorBlock.vue";
import FormText from "../../../atoms/Form/FormText.vue";
import {Block, BlockType} from "../../../../types/blocks";

interface Props {
    block: Block
}

defineProps<Props>()
defineEmits(['remove:block'])

</script>

<template>
    <EditorBlock v-if="BlockType.RAW === block.type" @remove:block="$emit('remove:block', block)">
        <template #title>Raw</template>
        <FormText v-model="block.content" />
    </EditorBlock>
</template>

<style scoped lang="scss">

</style>
