<script setup lang="ts">

import {ArrowUpOnSquareIcon, XMarkIcon} from "@heroicons/vue/20/solid"
import ModalHeader from "../atoms/Modal/ModalHeader.vue";
import ModalBody from "../atoms/Modal/ModalBody.vue";
import DropZone from "../molecules/DropZone.vue";
import Modal from "../atoms/Modal/Modal.vue";
import useFilesState from "../../states/files";
import {computed, onMounted} from "vue";
import useImagesState from "../../states/images";
import Btn from "../atoms/Btn.vue";
import {Colors} from "../../types/colors";

const filesState = useFilesState()
const imagesState = useImagesState()

interface Props {
    type: 'images'|'files',
    isOpen: boolean
}
const props = withDefaults(defineProps<Props>(), {
    type: 'images',
    isOpen: false,
})

defineEmits(['modal:close', 'file:click'])

const files = computed(() => {
    if (props.type === 'images') {
        return imagesState.items
    }
    if (props.type === 'files') {
        return filesState.items
    }
})

onMounted(async () => {
    if (props.type === 'images') {
        await imagesState.load()
    }
    if (props.type === 'files') {
        await filesState.paginate()
    }
})

</script>

<template>
    <Modal :is-open="isOpen">
        <ModalHeader with-close @modal:close="$emit('modal:close', $event)">Preview Image</ModalHeader>
        <ModalBody>
            <div class="mb-3">
                <DropZone @files="filesState.createFilePreviews"/>
            </div>
            <div v-if="filesState.previews.length > 0" class="mb-6">
                <Btn :type="Colors.primary" class="w-full"
                     @click="filesState.upload()"
                     :disabled="filesState.status.filesUploading.length > 0">
                    <ArrowUpOnSquareIcon class="size-5"/> Upload
                </Btn>
            </div>
            <div class="mb-6 grid grid-cols-6 gap-2" v-if="filesState.previews.length > 0">
                <div v-for="file in filesState.previews"
                     class="relative size-32 bg-center bg-cover bg-no-repeat w-full rounded"
                     :style="`background-image: url('${file.preview}')`">
                    <button class="block rounded-full p-1 bg-rose-800 hover:bg-rose-600 text-neutral-50 -right-1 -top-1 absolute drop-shadow-2xl duration-300"
                            @click="filesState.removePreview(file)">
                        <XMarkIcon class="size-4"/>
                    </button>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-2 max-h-min">
                <button v-for="file in files"
                        @click="$emit('file:click', file)"
                        class="outline hover:outline-4 duration-300 outline-blue-100 hover:outline-blue-400 ease-in-out rounded overflow-hidden">
                    <img :src="file.path" :alt="file.name" />
                </button>
            </div>
        </ModalBody>
    </Modal>
</template>

<style scoped lang="scss">

</style>
