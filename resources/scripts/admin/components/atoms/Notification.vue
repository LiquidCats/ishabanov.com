<script setup lang="ts">

import {Colors} from "../../domain/types/colors";
import {XMarkIcon} from "@heroicons/vue/24/outline";

interface Props {
    type?: Colors
    message: string
}

const props = defineProps<Props>()

const types = {
    [Colors.primary]: 'bg-blue-600 hover:bg-blue-500 text-white',
    [Colors.danger]: 'bg-red-100 text-red-800 border-red-200',
    [Colors.success]: 'bg-emerald-700 hover:bg-emerald-600 text-white',
    [Colors.warning]: 'bg-yellow-500 hover:bg-yellow-400 text-black',
    [Colors.dark]: 'bg-neutral-700 hover:bg-neutral-600 text-white',
    [Colors.light]: 'bg-neutral-200 hover:bg-neutral-300 text-neutral-800',
    default: 'bg-neutral-200 hover:bg-neutral-300 text-neutral-800',
}

</script>

<template>
    <div class="alert flex justify-between drop-shadow-lg overflow-hidden rounded p-4 border" :class="`${types[type] ?? types.default}`" role="alert">
        <span class="text-wrap text-break">{{ message }}</span>
        <button type="button" class="opacity-30 hover:opacity-40 duration-300" aria-label="Close" @click="$emit('close')">
            <XMarkIcon class="size-6" />
        </button>
    </div>
</template>

<style scoped lang="scss">

</style>
