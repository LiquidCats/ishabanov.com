<script setup lang="ts">

import {TrashIcon} from "@heroicons/vue/20/solid";

import {Block, BlockType} from "../../../../types/blocks";
import FormField from "../../../atoms/Form/FormField.vue";
import Btn from "../../../atoms/Btn.vue";
import FontFamilySelector from "../FontFamilySelector.vue";
import FontSizeSelector from "../FontSizeSelector.vue";
import FontWeightSelector from "../FontWeightSelector.vue";
import EditorBlock from "../EditorBlock.vue";

interface Props {
    block: Block
}

defineProps<Props>()
defineEmits(['clone:block', 'remove:block'])

</script>

<template>
    <EditorBlock v-if="BlockType.LIST_ITEM === block.type" tag="li"
                 @clone:block="$emit('clone:block', block)"
                 @remove:block="$emit('remove:block', block)">
        <template #header>
            <FontFamilySelector v-model="block.styles"/>
            <FontWeightSelector v-model="block.styles"/>
            <FontSizeSelector v-model="block.styles"/>
        </template>
        <div v-if="BlockType.LIST_ITEM === block.type" class="flex gap-1">
            <FormField v-model="block.content" class="py-1 grow"/>
            <Btn type="danger" @click.prevent="$emit('remove:block')">
                 <TrashIcon class="size-4"/>
            </Btn>
        </div>
    </EditorBlock>
</template>

<style scoped lang="scss">

</style>
