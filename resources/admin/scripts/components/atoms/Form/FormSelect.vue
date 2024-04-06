<script setup lang="ts">
    import {computed} from "vue";

    interface Props {
        modelValue: string|undefined,
        values: Array<string>
        deselectable?: boolean
    }

    const props = withDefaults(defineProps<Props>(), {
        deselectable: true,
        values: [],
        modelValue: undefined,
    })
    const emit = defineEmits(['update:modelValue'])

    const value = computed({
        get: () => props.modelValue,
        set: value => {
            emit("update:modelValue", value)
        }
    })
</script>

<template>
    <select v-model="value"
            class="border text-xs rounded-md block w-full p-1.5 bg-stone-600 border-stone-500 placeholder-gray-400 text-white focus:ring-stone-300 focus:border-stone-300 outline-none duration-300">
        <option v-if="deselectable" :value="undefined">None</option>
        <option v-for="v in values"
                :value="v"
                :key="`option-${v}`">{{ v }}</option>
    </select>
</template>

<style scoped lang="scss">

</style>
