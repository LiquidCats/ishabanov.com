<script setup lang="ts">

import type {File} from "../../types/data";
//
import ModalHeader from "../atoms/Modal/ModalHeader.vue";
import ModalBody from "../atoms/Modal/ModalBody.vue";
import DropZone from "../molecules/DropZone.vue";
import Modal from "../atoms/Modal/Modal.vue";


interface Props {
    type: string,
    list: File[],
    isOpen: boolean
}
const props = withDefaults(defineProps<Props>(), {
    type: 'images',
    list: [],
    isOpen: false,
})

defineEmits(['modal:close', 'file:click', 'file:dropped'])

</script>

<template>
      <Modal :is-open="isOpen">
        <ModalHeader with-close @modal:close="$emit('modal:close', $event)">Preview Image</ModalHeader>
        <ModalBody>
            <div class="mb-3">
                <DropZone @files="$emit('file:dropped', $event)"/>
            </div>
            <div class="grid grid-cols-3 gap-2 max-h-min">
                <button v-for="file in list"
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
