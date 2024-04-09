<script setup lang="ts">
import {computed} from "vue";
//
import EditorBlock from "../EditorBlock.vue";
import Draggable from "vuedraggable";
//
import {Block, blockRenderers, blocks, BlockType, emptyBlocks} from "../../../../types/blocks";
import AddBlock from "../AddBlock.vue";

interface Props {
    block: Block<Block[]>
}

const props = defineProps<Props>()
defineEmits(['remove:block'])

const dragOptions = computed(() => ({
    animation: 200,
    group: "remark",
    disabled: false,
    ghostClass: "ghost"
}))

const remarkBlocks: any[] = blocks.filter(b => b.type !== BlockType.REMARK)

function addBlock(type: BlockType) {
    props.block.content = [...props.block.content, emptyBlocks[type]]
}

</script>

<template>
    <EditorBlock v-if="BlockType.REMARK === block.type" @remove:block="$emit('remove:block', block)">
        <template #title>Remark</template>
        <template #header>
            <AddBlock group="remark" :list="remarkBlocks" @add:block="addBlock"/>
        </template>
        <Draggable v-bind="dragOptions" handle=".block-editor-handle" tag="ul" v-model="block.content" item-key="index,type">
            <template #item="{element}">
                <li>
                    <component :is="blockRenderers[element.type]" :block="element"/>
                </li>
            </template>
        </Draggable>
    </EditorBlock>
</template>

<style scoped lang="scss">
.flip-list-move {
  transition: transform 0.5s;
}

.no-move {
  transition: transform 0s;
}

.ghost {
  opacity: 0.5;
}
</style>
