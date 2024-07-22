<script setup lang="ts">


import {onMounted, onUpdated, ref} from "vue";

interface Props {
    modelValue?: string
    failed?: boolean
}

const emits = defineEmits<{
    'update:modelValue': [value: string],
}>()

withDefaults(defineProps<Props>(), {
    modelValue: '',
    failed: false
})

const textArea = ref<HTMLTextAreaElement>(null)

function handleInput() {
    emits('update:modelValue', textArea?.value?.value)
}

function resize() {
    textArea.value.style.height = '6.25rem'
    textArea.value.style.height = `${textArea.value.scrollHeight}px`
}

onMounted(resize)
onUpdated(resize)

</script>

<template>
    <textarea ref="textArea"
              class="border overflow-hidden resize-none text-md rounded-md block w-full min-h-24 p-1.5 bg-neutral-100 dark:bg-zinc-600 border-stone-500 placeholder-gray-400 dark:text-gray-50 hover:border-stone-400 focus:ring-stone-300 focus:border-stone-300 outline-none transition-colors duration-300 ease-in-out"
              :class="{'border-red-500': failed}"
              @input="handleInput"
              :value="modelValue"/>
</template>

<style scoped lang="scss">

</style>
