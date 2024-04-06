<script setup lang="ts">

import {computed} from "vue";
import EditorBlock from "../EditorBlock.vue";
import FormText from "../../../atoms/Form/FormText.vue";
import FormSelect from "../../../atoms/Form/FormSelect.vue";
import {Block, BlockType, codeLanguages} from "../../../../types/blocks";

interface Props {
    block: Block
}

const props = defineProps<Props>()
defineEmits(['remove:block'])

const language = computed({
    get: () => {
        const [cl] = props?.block?.styles || []
        return cl
    },
    set: v => {
        props.block.styles = [v]
    }
})

</script>

<template>
    <EditorBlock v-if="BlockType.CODE === block.type"
                 @remove:block="$emit('remove:block', block)">
        <template #title>Code</template>
        <template #header>
            <FormSelect :values="codeLanguages" v-model="language" />
        </template>
        <FormText v-model="block.content" />
    </EditorBlock>
</template>

<style scoped lang="scss">

</style>
