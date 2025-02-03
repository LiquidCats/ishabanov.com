<script setup lang="ts">

import {CheckCircleIcon} from "@heroicons/vue/24/outline";
interface Props {
    isChecked: boolean
}



const props = defineProps<Props>()

</script>

<template>
    <button class="flex items-center border border-neutral-500 rounded-md py-3 px-6 text-white duration-300 bg-stone-700 hover:bg-neutral-600 disabled:bg-slate-300 disabled:cursor-not-allowed">
        <span class="flex gap-4 justify-between w-full">
            <span><slot></slot></span>
            <CheckCircleIcon class="size-6 rounded-full border border-stone-500" v-if="isChecked"/>
            <span class=" block size-5 rounded-full border border-stone-500" v-if="!isChecked"/>
        </span>
    </button>
</template>

<style scoped lang="scss">

</style>
