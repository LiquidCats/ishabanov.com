<script setup lang="ts">


import {computed} from "vue";

interface Props {
    modelValue?: string
    failed?: boolean
}

const emit = defineEmits(['update:modelValue'])

const props = withDefaults(defineProps<Props>(), {
    modelValue: '',
    failed: false
})

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
    <textarea class="border text-md rounded-md block w-full min-h-48 p-1.5 bg-stone-600 border-stone-500 placeholder-gray-400 text-white focus:ring-stone-300 focus:border-stone-300 outline-none duration-300"
              :class="{'border-red-500': failed}"
              v-model="value"/>
</template>

<style scoped lang="scss">

</style>
