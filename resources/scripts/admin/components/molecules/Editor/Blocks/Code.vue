<script setup lang="ts">

import {computed} from "vue";
import EditorBlock from "../EditorBlock.vue";
import FormText from "../../../atoms/Form/FormText.vue";
import FormSelect from "../../../atoms/Form/FormSelect.vue";
import {Block} from "@kernel/types/blocks";
import {BlockTypes} from "@kernel/enums/blocks";
import {codeLanguages} from "@kernel/enums/code";

interface Props {
    block: Block
}

const props = defineProps<Props>()
defineEmits(['remove:block', 'clone:block'])

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
    <EditorBlock v-if="BlockTypes.code === block.type"
                 @clone:block="$emit('clone:block', block)"
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
