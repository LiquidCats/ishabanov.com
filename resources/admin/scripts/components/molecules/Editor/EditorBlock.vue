<script setup lang="ts">

import {DocumentDuplicateIcon, Bars4Icon, XMarkIcon} from "@heroicons/vue/24/outline";
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
defineEmits(['remove:block', "clone:block"])

</script>

<template>
    <component :is="tag">
        <div class="flex flex-row mb-3 gap-3" v-if="$slots?.title">
            <div>
                <Btn type="light" class="!p-1 inline-flex gap-1 cursor-move block-editor-handle">
                    <Bars4Icon class="size-4"/>
                    <slot name="title"></slot>
                </Btn>

            </div>
            <div class="ml-auto inline-flex gap-1" v-if="$slots?.title">
                <Btn type="light" class="!p-1" @click.prevent="$emit('clone:block')">
                    <DocumentDuplicateIcon class="size-4"/>
                </Btn>
                <Btn type="danger" class="!p-1" @click.prevent="$emit('remove:block')">
                    <XMarkIcon class="size-4"/>
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
