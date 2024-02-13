<script setup lang="ts">
interface Props {
    value: string
    failed: boolean
}

defineEmits(['input'])
defineProps<Props>()
</script>

<template>
    <input class="border text-lg rounded-md block w-full p-2.5 bg-stone-600 border-stone-500 placeholder-gray-400 text-white focus:ring-stone-300 focus:border-stone-300 outline-none duration-300"
           :class="{
                'border-red-500': failed
            }"
           :value="value"
           @input="$emit('input', $event)">
</template>

<style scoped lang="scss">

</style>
