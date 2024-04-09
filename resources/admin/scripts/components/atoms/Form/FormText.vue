<script setup lang="ts">


interface Props {
    modelValue?: string
    failed?: boolean
}

const emit = defineEmits(['update:modelValue'])

withDefaults(defineProps<Props>(), {
    modelValue: '',
    failed: false
})

</script>

<template>
    <textarea class="border text-md rounded-md block w-full min-h-48 p-1.5 bg-stone-600 border-stone-500 placeholder-gray-400 text-white focus:ring-stone-300 focus:border-stone-300 outline-none duration-300"
              :class="{'border-red-500': failed}"
              @input="$emit('update:modelValue', $event?.target?.value)"
              :value="modelValue"/>
</template>

<style scoped lang="scss">

</style>
