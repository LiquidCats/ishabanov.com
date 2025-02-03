<script setup lang="ts">
import {computed} from "vue";
//
import EditorBlock from "../EditorBlock.vue";
import Draggable from "vuedraggable";
//
import {Block} from "@kernel/types/blocks";
import {BlockTypes} from "@kernel/enums/blocks";
import AddBlock from "../AddBlock.vue";
import {idMapper} from "../../../../utils/idMapper";
import {blockPreviews, blockRenderers, emptyBlocks} from "../../../../utils/blocks/getters";

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

const remarkBlocks: any[] = []
for (const blockPreview of blockPreviews) {
    if (blockPreview.type === BlockTypes.remark) {
        continue
    }
    remarkBlocks.push(blockPreview)
}


function handleAddBlock(type: BlockTypes) {
    props.block.content = [
        ...props.block.content,
        idMapper(emptyBlocks[type]),
    ]
}
function handleRemoveBlock(block: Block) {
    props.block.content = props.block.content.filter(b => b !== block)
}
</script>

<template>
    <EditorBlock v-if="BlockTypes.remark === block.type"
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
                   :list="block.content"
                   item-key="key">
            <template #item="{element}">
                <li>
                    <component :is="blockRenderers[element.type]"
                               :key="element.key"
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
