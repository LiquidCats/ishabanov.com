<script setup lang="ts">

import {ParagraphStyleType} from "@admin/types/blockTypes";

const model = defineModel<ParagraphStyleType>({
    required: false,
    default: ParagraphStyleType.unordered
})

</script>

<template>
    <div class="flex text-xs items-center justify-center rounded-md border border-stone-500 divide-stone-700 divide-x bg-neutral-100 hover:border-stone-400 ease-in-out transition-colors duration-300">
        <button class="px-2 py-1 hover:bg-gray-200  ease-in-out transition-colors duration-300"
                :class="{
                    'bg-gray-300': model === type
                }"
                @click="model = type"
                v-for="type in ParagraphStyleType">
            {{ type }}
        </button>
    </div>
</template>
