<script setup lang="ts">

import {TrashIcon, Squares2X2Icon} from "@heroicons/vue/20/solid";
import Btn from "../../atoms/Btn.vue";

interface Props {
    tag?: 'div'|'li'
}

interface Slots {
    default: any,
    title: string,
    header: any
}

withDefaults(defineProps<Props>(), {
    tag: 'div'
})
defineSlots<Slots>()
defineEmits(['remove:block'])

</script>

<template>
    <component :is="tag" class="rounded-md bg-stone-800 p-3 border border-stone-700">
        <div class="flex flex-row mb-3 gap-3" v-if="$slots?.title">
            <div>
                <Btn type="light" class="cursor-move block-editor-handle">
                    <Squares2X2Icon class="size-4"/>
                </Btn>
            </div>
            <div class="text-lg font-bold grow"><slot name="title"></slot></div>
            <div>
                <Btn type="danger" @click.prevent="$emit('remove:block')">
                    <TrashIcon class="size-4"/>
                </Btn>
            </div>
        </div>
        <div class="flex mb-1.5 gap-1" v-if="$slots?.header">
            <slot name="header"></slot>
        </div>
        <slot></slot>
    </component>
</template>

<style scoped lang="scss">

</style>
