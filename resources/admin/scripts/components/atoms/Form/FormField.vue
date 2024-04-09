<script setup lang="ts">

interface Props {
    modelValue?: string
    failed?: boolean
}

defineEmits(['update:modelValue'])

withDefaults(defineProps<Props>(), {
    modelValue: '',
    failed: false
})

</script>

<template>
    <input class="border text-md rounded-md block w-full p-1.5 bg-stone-600 border-stone-500 placeholder-gray-400 hover:border-stone-400 text-white focus:ring-stone-300 focus:border-stone-300 outline-none transition-colors ease-in-out duration-300"
           :class="{
                'border-red-500': failed
            }"
           :value="modelValue"
           @input="$emit('update:modelValue', $event?.target?.value)">
</template>

<style scoped lang="scss">

</style>
