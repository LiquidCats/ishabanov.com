<script setup lang="ts">

import {PreviewTypes} from "../../../types/data";
import {PlusIcon, Bars3BottomLeftIcon, ArrowsPointingOutIcon, TrashIcon} from "@heroicons/vue/20/solid";
import Btn from "../../atoms/Btn.vue";

interface Props {
    previewPath?: string
    previewType?: PreviewTypes
    hasPreview: boolean
}

defineEmits(['click:image', 'click:remove', 'click:preview-type'])
defineProps<Props>()

</script>

<template>
    <div :style="`background-image: url('${previewPath}')`"
         class="relative overflow-hidden w-48 h-32 bg-stone-700 hover:bg-neutral-600 duration-300 rounded-xl text-gray-300 flex items-center justify-center bg-no-repeat bg-clip-border bg-cover bg-center">
        <a href="#" class="absolute -inset-1 bg-transparent hover:bg-bg-stone-700/[.9]" @click.prevent="$emit('click:image', $event)"/>
        <div class="flex gap-1 absolute bottom-0 left-0 right-0 justify-center p-1 bg-stone-900/[.5]" v-if="hasPreview">
            <Btn :type="previewType === PreviewTypes.LEFT_SIDE ? 'primary' : 'light' "
                 @click.prevent="$emit('click:preview-type', PreviewTypes.LEFT_SIDE, $event)">
                <Bars3BottomLeftIcon class="size-3"/>
            </Btn>
            <Btn :type="previewType === PreviewTypes.FILL ? 'primary' : 'light' "
                 @click.prevent="$emit('click:preview-type', PreviewTypes.FILL, $event)">
                <ArrowsPointingOutIcon class="size-3"/>
            </Btn>
            <Btn type="danger"
                 class="px-1 py-0.5"
                 @click.prevent="$emit('click:remove', $event)">
                <TrashIcon class="size-3"/>
            </Btn>
        </div>
        <PlusIcon class="size-12" v-else/>
    </div>
</template>
