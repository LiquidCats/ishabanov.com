<script setup lang="ts">

import {BlockTypes, ListStyleType} from "@kernel/enums/blocks";
import {Block} from "@kernel/types/blocks";

import {PlusIcon} from "@heroicons/vue/24/outline";
//
import EditorBlock from "../EditorBlock.vue";
import ListStyleSelector from "../Selectors/ListStyleSelector.vue";
import ListItem from "./ListItem.vue";
import Btn from "../../../atoms/Btn.vue";
//
import {idMapper} from "../../../../utils/idMapper";
import {emptyBlocks} from "../../../../utils/blocks/getters";

interface Props {
    block: Block<string, ListStyleType>
}

const props = defineProps<Props>()
defineEmits(['clone:block','remove:block'])

function removeBlock(block: Block) {
    props.block.content = props.block.content.filter(b => b !== block)
}
function addBlock() {
    props.block.content = [...props.block.content, idMapper<Block>(emptyBlocks[BlockTypes.listItem])]
}

</script>

<template>
    <EditorBlock v-if="BlockTypes.list === block.type"
                 @clone:block="$emit('clone:block', block)"
                 @remove:block="$emit('remove:block', block)">
        <template #title>List</template>
        <template #header>
            <ListStyleSelector v-model="block.styles.type" />
        </template>
        <ul class="grid grid-cols-1 gap-1 mb-1.5 border border-stone-500 rounded-md p-1">
            <li class="text-center" v-if="block.content.length === 0">no items</li>
            <ListItem v-for="(listItem, i) in block.content"
                      :block="listItem"
                      :key="`${block.key}-list-item-${i}`"
                      @remove:block="removeBlock(listItem)"/>
        </ul>
        <Btn type="dark" class=" ml-auto" @click="addBlock"><PlusIcon class="size-6" /> Add</Btn>
    </EditorBlock>
</template>

<style scoped lang="scss">

</style>
