<script setup lang="ts">

import {computed, ref} from "vue";
import {PhotoIcon} from "@heroicons/vue/24/outline";

import EditorBlock from "../EditorBlock.vue";
import FilesModal from "../../../organisms/FilesModal.vue";
import Btn from "../../../atoms/Btn.vue";
import FormField from "../../../atoms/Form/FormField.vue";

import {FileResource} from "@kernel/types/api";
import {Block, ImageContent} from "@kernel/types/blocks";
import {BlockTypes} from "@kernel/enums/blocks";

interface Props {
    block: Block<ImageContent>
}

const props = defineProps<Props>()
defineEmits(['remove:block', 'clone:block'])

const openModal = ref<boolean>(false)

function selectImage(file: FileResource) {
    props.block.content.alt = file.name
    props.block.content.src = file.path
    props.block.content.caption = props.block?.content?.caption ?? ''
    openModal.value = false
}

const caption = computed({
    get: () => props.block?.content?.caption ?? '',
    set: v => {
        props.block.content.caption = v
    }
})

</script>

<template>
    <EditorBlock v-if="block.type === BlockTypes.image"
                 @clone:block="$emit('clone:block', block)"
                 @remove:block="$emit('remove:block', block)">
        <template #title>Image</template>
        <template #header>
            <Btn type="primary" @click="openModal = true" class="flex gap-1 !py-1">
                <PhotoIcon class="size-6"/>
                <span class="hidden md:inline">Select Image</span>
            </Btn>
        </template>
        <div class="grid md:grid-cols-3 grid-cols-1 gap-1">
            <div>
                <img v-if="block?.content?.src" :src="block.content.src" :alt="block.content?.name"
                     class="rounded-md w-full h-auto">
            </div>
            <div class="md:col-span-2">
                <FormField v-model="caption" placeholder="Caption"></FormField>
            </div>
        </div>

        <FilesModal type="images"
                    :is-open="openModal"
                    @file:click="selectImage"
                    @modal:close="openModal = false"/>
    </EditorBlock>
</template>

<style scoped lang="scss">

</style>
