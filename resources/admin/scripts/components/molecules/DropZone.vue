<script setup lang="ts">

import {ref} from "vue";

const filesFieldRef = ref<null|HTMLInputElement>(null)
const dropZoneActive = ref<boolean>(false)

const emit = defineEmits(['files'])

function openFileSelector() {
    filesFieldRef.value?.click()
}

function onFiles(e: Event | DragEvent) {
    let files: FileList = (e instanceof DragEvent)
        ? e?.dataTransfer?.files
        : e.target?.files

    emit('files', files || new FileList())

    dropZoneActive.value = false
}

</script>

<template>
    <div class="block border px-4 py-8 rounded-md text-center duration-300 cursor-pointer"
         :class="{
             'border-gray-400': !dropZoneActive,
             'border-green-500': dropZoneActive,
         }"
         @click="openFileSelector"
         @dragover.prevent="dropZoneActive = true"
         @dragleave.prevent="dropZoneActive = false"
         @drop.prevent="onFiles($event)">
        <span class="text-xl fw-medium text-gray-400">Drop files here or click to upload</span>
        <input ref="filesFieldRef" type="file" class="hidden" @change="onFiles($event)" multiple>
    </div>
</template>

<style scoped lang="scss">

</style>
