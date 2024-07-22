<script setup lang="ts">

import {CheckCircleIcon} from "@heroicons/vue/20/solid";
import {computed} from "vue";

interface Props {
    modelValue: boolean
    name: string
    id: string
}

const props = withDefaults(defineProps<Props>(), {
    modelValue: false,
    name: '',
    id: ''
})
const emit = defineEmits(['update:modelValue'])

const value = computed({
    get() {
        return props.modelValue
    },
    set(value) {
        emit('update:modelValue', value)
    }
})

</script>

<template>
    <label class="inline-flex gap-2 items-center border border-neutral-500 rounded-md p-2 py-1 dark:text-gray-50 duration-300 bg-neutral-100 dark:bg-zinc-600 dark:hover:bg-neutral-700 hover:bg-neutral-300 disabled:bg-slate-300">
        <CheckCircleIcon class="size-4 rounded-full border border-stone-500" v-if="value"/>
        <span class=" block size-4 rounded-full border border-stone-500" v-if="!value"/>
        <span><slot></slot></span>
        <input class="hidden"
               :name="name"
               type="checkbox"
               :id="id"
               v-model="value">
    </label>
</template>

<style scoped lang="scss">

</style>
