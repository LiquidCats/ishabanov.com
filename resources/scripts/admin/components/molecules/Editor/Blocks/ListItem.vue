<script setup lang="ts">

import {TrashIcon} from "@heroicons/vue/24/outline";

import {Block} from "@kernel/types/blocks";
import {BlockTypes} from "@kernel/enums/blocks";
import FormField from "../../../atoms/Form/FormField.vue";
import Btn from "../../../atoms/Btn.vue";
import EditorBlock from "../EditorBlock.vue";

interface Props {
    block: Block
}

defineProps<Props>()
defineEmits(['clone:block', 'remove:block'])

</script>

<template>
    <EditorBlock v-if="BlockTypes.listItem === block.type" tag="li"
                 @clone:block="$emit('clone:block', block)"
                 @remove:block="$emit('remove:block', block)">
        <template #header>
        </template>
        <div v-if="BlockTypes.listItem === block.type" class="flex gap-1">
            <FormField v-model="block.content" class="py-1 grow"/>
            <Btn type="danger" @click.prevent="$emit('remove:block')">
                 <TrashIcon class="size-4"/>
            </Btn>
        </div>
    </EditorBlock>
</template>

<style scoped lang="scss">

</style>
