<script setup lang="ts">

import {BlockType} from "../../../types/blocks";
import {RenderFunction} from "vue";

interface Props {
    type: BlockType
    icon: RenderFunction
    name: string
}
defineProps<Props>()
defineEmits(['click'])

</script>

<template>
    <div class="rounded-md px-3 py-1 border dark:bg-zinc-600 bg-stone-200 dark:border-stone-500 border-stone-100 hover:border-stone-400 dark:hover:bg-stone-500 hover:bg-stone-300 duration-300 relative flex flex-col items-center justify-center gap-1 h-24">
        <a href="#" @click.prevent="$emit('click', type)" class="absolute -inset-1" />
        <div><component :is="icon" class="size-6"/></div>
        <div>{{ name }}</div>
    </div>
</template>

<style scoped lang="scss">

</style>
