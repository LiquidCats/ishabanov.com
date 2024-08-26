<script setup lang="ts">

import {computed} from "vue";
import Draggable from "vuedraggable";

import Btn from "../../atoms/Btn.vue";
import {SquaresPlusIcon} from "@heroicons/vue/24/outline";
import {Block, BlockPreview, BlockType} from "../../../types/blocks";
import {idMapper} from "../../../utils/idMapper";
import AddBlockItem from "./AddBlockItem.vue";
import {emptyBlocks} from "../../../utils/blocks/getters";

interface Props {
    list?: Array<BlockPreview>
    group?: string
    disabled?: boolean,
    lastIndex?: number,
}

const props = withDefaults(defineProps<Props>(), {
    list: () => [],
    group: 'content',
    disabled: false,
    lastIndex: 1000,
})
defineEmits(['add:block'])

const groupOptions = computed(() => ({
    name: props.group,
    pull: 'clone',
    put: false
}))

function cloneBlock({type}: {type: BlockType}): Block {
    return idMapper<Block>(emptyBlocks[type])
}

</script>

<template>
    <Popper>
        <Btn type="light" :disabled="disabled">
            <SquaresPlusIcon class="size-6"/>
            <span class="hidden md:inline">Add Block</span>
        </Btn>
        <template #content>
            <Draggable
                item-key="key"
                :list="list"
                :clone="cloneBlock"
                :group="groupOptions"
                class="grid grid-cols-3 flex-row gap-1 dark:text-gray-50 dark:bg-zinc-800 bg-stone-50 border dark:border-stone-700 border-stone-200 p-3 rounded-md z-10 shadow-lg">
                <template #item="{ element }">
                    <AddBlockItem @click="$emit('add:block', $event)"
                                  :icon="element.icon"
                                  :name="element.name"
                                  :type="element.type" />
                </template>

            </Draggable>
        </template>
    </Popper>
</template>

<style scoped lang="scss">

</style>
