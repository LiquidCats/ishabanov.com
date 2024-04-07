<script setup lang="ts">

import {computed} from "vue";
import Draggable from "vuedraggable";

import Btn from "../../atoms/Btn.vue";
import {SquaresPlusIcon} from "@heroicons/vue/24/outline";
import {Block, BlockType, emptyBlocks} from "../../../types/blocks";

interface Props {
    list?: Block[]
    group?: string
}

const props = withDefaults(defineProps<Props>(), {
    list: () => [],
    group: 'content',
})
defineEmits(['add:block'])

const groupOptions = computed(() => ({
    name: props.group,
    pull: 'clone',
    put: false
}))

function cloneBlock({type}: {type: BlockType}) {
    return emptyBlocks[type]
}

</script>

<template>
    <Popper>
        <Btn type="light">
            <SquaresPlusIcon class="size-6"/>
            <span class="hidden md:inline">Add Block</span>
        </Btn>
        <template #content>
            <Draggable
                item-key="type"
                :list="list"
                :clone="cloneBlock"
                :group="groupOptions"
                class="grid grid-cols-3 flex-row gap-1 text-gray-50 bg-stone-800 border-stone-500 p-3 rounded-md z-10 shadow-lg">
                <template #item="{ element, index }">
                    <div class="rounded-md px-3 py-1 border bg-stone-600 border-stone-500 hover:border-stone-400 hover:bg-stone-500 duration-300 relative flex flex-col items-center justify-center gap-1 h-24">
                        <a href="#" @click.prevent="$emit('add:block', element.type)" class="absolute -inset-1" />
                        <div><component :is="element.icon" class="size-6"/></div>
                        <div>{{ element.name }}</div>
                    </div>
                </template>

            </Draggable>
        </template>
    </Popper>
</template>

<style scoped lang="scss">

</style>
