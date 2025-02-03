<script setup lang="ts">
import {ChevronUpDownIcon} from "@heroicons/vue/24/outline";
import Popper from "vue3-popper";
import {ref} from "vue";

interface Props {
    modelValue: string|undefined,
    values: Array<string>
    deselectable?: boolean
}

withDefaults(defineProps<Props>(), {
    deselectable: true,
    values: () => [],
    modelValue: undefined,
})

defineEmits(['update:modelValue'])

const active = ref<boolean>(false)

</script>

<template>
    <Popper offsetDistance="5 0"
            placement="bottom-start"
            @open:popper="active = true;"
            @close:popper="active = false;"
            class="relative w-full">
        <div class="cursor-pointer border text-sm inline-flex flex-row flex-nowrap rounded-md bg-neutral-100 dark:bg-zinc-600 border-stone-500 dark:text-gray-50 items-center py-1 px-2 gap-3 transition-colors ease-in-out duration-300 relative overflow-clip"
             :class="{
                'border-stone-300': active,
                'hover:border-stone-400': !active,
             }">
            {{ modelValue ?? 'None' }}
            <ChevronUpDownIcon class="size-6"></ChevronUpDownIcon>
        </div>
        <template #content="formSelectProps">
            <div class="dark:bg-zinc-800 bg-stone-100 border border-stone-700 rounded-md p-1 cursor-pointer max-h-32 overflow-auto mr-3 w-full shadow-2xl">
                <div class="py-1 pl-3 duration-300 pr-5 rounded-md dark:hover:bg-stone-600 hover:bg-stone-200"
                     v-if="deselectable"
                     @click="$emit('update:modelValue', undefined); formSelectProps.close()">None</div>
                <div class="py-1 pl-3 duration-300 pr-5 rounded-md dark:hover:bg-stone-600 hover:bg-stone-200"
                     :class="{
                        'bg-stone-200 dark:bg-zinc-600': modelValue === v
                     }"
                     v-for="v in values"
                     @click="$emit('update:modelValue', v); formSelectProps.close()"
                     :key="`option-${v}`">{{ v }}</div>
            </div>
        </template>
    </Popper>
</template>

<style scoped lang="scss">

</style>
