<script setup lang="ts">
import {XMarkIcon} from "@heroicons/vue/24/outline"

defineEmits(['modal:close'])
defineProps({
    withClose: {
        type: Boolean,
        default: false,
        required: false,
    }
})
</script>

<template>
    <header class="flex items-center justify-between mb-3">
        <div class="dark:text-gray-50 text-xl font-bold"><slot></slot></div>
        <div v-if="withClose">
            <button class="dark:text-gray-50 opacity-30 hover:opacity-50 duration-300 cursor-pointer" @click="$emit('modal:close')">
                <XMarkIcon class="h-6 w-6"/>
            </button>
        </div>
    </header>
</template>

<style scoped lang="scss">

</style>
