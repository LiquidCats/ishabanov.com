<script setup lang="ts">

import {Block, Blocks, BlockType, ListTag, listTags} from "../../../../types/blocks";
import EditorBlock from "../EditorBlock.vue";
import TagSelector from "../TagSelector.vue";
import ListItem from "./ListItem.vue";
import {PlusIcon} from "@heroicons/vue/20/solid";
import Btn from "../../../atoms/Btn.vue";

interface Props {
    block: Block<Blocks, ListTag>
}

const props = defineProps<Props>()
defineEmits(['remove:block'])

function removeBlock(block: Block) {
    props.block.content = props.block.content.filter(b => b !== block)
}
function addBlock() {
    props.block.content = [...props.block.content, {type: BlockType.LIST_ITEM} as Block]
}

</script>

<template>
    <EditorBlock v-if="BlockType.LIST === block.type"
                 @remove:block="$emit('remove:block', block)">
        <template #title>List</template>
        <template #header>
            <TagSelector v-model="block.tag" :values="listTags"/>
        </template>
        <ul class="grid grid-cols-1 gap-1 mb-1.5">
            <ListItem v-for="(listItem, i) in block.content"
                      :block="listItem"
                      :key="`list-item-${i}`" @remove:block="removeBlock(listItem)"/>
        </ul>
        <div>
            <Btn type="dark" class=" ml-auto" @click="addBlock"><PlusIcon class="size-6" /> Add</Btn>
        </div>
    </EditorBlock>
</template>

<style scoped lang="scss">

</style>
