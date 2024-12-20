<script setup lang="ts">

interface Props {
    failed?: boolean
    success?: boolean
}

const model = defineModel()

withDefaults(defineProps<Props>(), {
    failed: false,
    success: false,
})

</script>

<template>
    <input class="border text-md rounded-md block w-full p-1.5 bg-neutral-100 dark:bg-zinc-600 placeholder-gray-400 dark:text-gray-50 outline-none transition-colors ease-in-out duration-300"
           :class="{
                'border-red-500 hover:border-red-400 focus:ring-red-300 focus:border-red-300': failed,
                'border-stone-500 hover:border-stone-400 focus:ring-stone-300 focus:border-stone-300': !failed && !success,
                'border-green-500 hover:border-green-400 focus:ring-green-300 focus:border-green-300': success && !failed,
            }"
           v-model="model" />
</template>

<style scoped lang="scss">

</style>
