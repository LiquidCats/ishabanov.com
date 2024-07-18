<script setup lang="ts">
import {computed} from "vue";
//
import EditorBlock from "../EditorBlock.vue";
import Draggable from "vuedraggable";
//
import {Block, blockRenderers, blockPreviews, BlockType, emptyBlocks} from "../../../../types/blocks";
import AddBlock from "../AddBlock.vue";
import {idMapper} from "../../../../utils/idMapper";

interface Props {
    block: Block<Block[]>
}

const props = defineProps<Props>()

defineEmits(['clone:block', 'remove:block'])

const dragOptions = computed(() => ({
    animation: 200,
    group: "remark",
    disabled: false,
    ghostClass: "ghost"
}))

const remarkBlocks: any[] = blockPreviews.filter(b => b.type !== BlockType.REMARK)

function handleAddBlock(type: BlockType) {
    props.block.content = [
        ...props.block.content,
        idMapper(emptyBlocks[type], props.block.content.length)
    ]
}
function handleRemoveBlock(block: Block) {
    props.block.content = props.block.content.filter(b => b !== block)
}
</script>

<template>
    <EditorBlock v-if="BlockType.REMARK === block.type"
                 @clone:block="$emit('clone:block', block)"
                 @remove:block="$emit('remove:block', block)">
        <template #title>Remark</template>
        <template #header>
            <AddBlock group="remark"
                      :list="remarkBlocks"
                      :last-index="block.content.length"
                      @add:block="handleAddBlock"/>
        </template>
        <Draggable v-bind="dragOptions"
                   handle=".block-editor-handle"
                   tag="ul"
                   class="space-y-1 border border-stone-500 rounded-md p-1"
                   v-model="block.content"
                   item-key="id">
            <template #item="{element}">
                <li>
                    <component :is="blockRenderers[element.type]"
                               :block="element"
                               @remove:block="handleRemoveBlock"/>
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
