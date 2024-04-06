<script setup lang="ts">

import {computed, ref} from "vue";
import {PhotoIcon} from "@heroicons/vue/20/solid";

import EditorBlock from "../EditorBlock.vue";
import FilesModal from "../../../organisms/FilesModal.vue";
import Btn from "../../../atoms/Btn.vue";

import {File} from "../../../../types/data";
import {Block, BlockType, ImageContent} from "../../../../types/blocks";
import FormField from "../../../atoms/Form/FormField.vue";
import FontFamilySelector from "../FontFamilySelector.vue";
import FontSizeSelector from "../FontSizeSelector.vue";
import FontWeightSelector from "../FontWeightSelector.vue";

interface Props {
    block: Block<ImageContent>
}

const props = defineProps<Props>()
defineEmits(['remove:block'])

const openModal = ref<boolean>(false)

function selectImage(file: File) {
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
    <EditorBlock v-if="block.type === BlockType.IMAGE"  @remove:block="$emit('remove:block', block)">
        <template #title>Image</template>
        <template #header>
            <Btn type="primary" @click="openModal = true" class="flex gap-1 !py-1">
                <PhotoIcon class="size-6"/>
                Select Image
            </Btn>
            <FontFamilySelector v-model="block.styles"/>
            <FontWeightSelector v-model="block.styles"/>
            <FontSizeSelector v-model="block.styles"/>
        </template>
        <div class="grid md:grid-cols-3 grid-cols-1 gap-1">
            <div>
                <img v-if="block?.content?.src" :src="block.content.src" :alt="block.content.name"
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
