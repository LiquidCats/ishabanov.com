<script setup lang="ts">

import {PreviewTypes} from "../../types/data";
import {PlusIcon, Bars3BottomLeftIcon, ArrowsPointingOutIcon, TrashIcon} from "@heroicons/vue/20/solid";
import Btn from "../../components/atoms/Btn.vue";
import usePostState from "../../states/post";
import useModalsState from "../../states/modals";

const postState = usePostState()
const modalsState = useModalsState()

</script>

<template>
    <div :style="`background-image: url('${postState.item?.previewImage?.path}')`"
         class="relative overflow-hidden w-48 h-32 bg-stone-700 hover:bg-neutral-600 duration-300 rounded-xl text-gray-300 flex items-center justify-center bg-no-repeat bg-clip-border bg-cover bg-center">
        <a href="#" class="absolute -inset-1 bg-transparent hover:bg-bg-stone-700/[.9]" @click.prevent="modalsState.open('images')"/>
        <PlusIcon class="size-12" v-if="!postState.item?.previewImage?.path"/>
        <div class="flex gap-1 absolute bottom-0 left-0 right-0 justify-center p-1 bg-stone-900/[.5]" v-if="postState.item?.previewImage?.path">
            <Btn type="secondary"
                 @click="postState.item.preview_image_type = PreviewTypes.LEFT_SIDE">
                <Bars3BottomLeftIcon class="size-3"/>
            </Btn>
            <Btn type="secondary"
                 @click="postState.item.preview_image_type = PreviewTypes.LEFT_SIDE">
                <ArrowsPointingOutIcon class="size-3"/>
            </Btn>
            <Btn type="danger"
                 class="px-1 py-0.5"
                 @click="postState.item.preview_image_id = null; postState.item.preview_image_type = null; postState.item.previewImage = null">
                <TrashIcon class="size-3"/>
            </Btn>
        </div>
    </div>
</template>

<style scoped lang="scss">

</style>
