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
    <div class="block border-dashed border-4 px-4 py-8 rounded-xl text-center duration-300 bg-stone-800 cursor-pointer"
         :class="{
             'border-stone-600': !dropZoneActive,
             'border-green-700': dropZoneActive,
         }"
         @click="openFileSelector"
         @dragover.prevent="dropZoneActive = true"
         @dragleave.prevent="dropZoneActive = false"
         @drop.prevent="onFiles($event)">
        <div class="text-xl fw-medium text-neutral-300">Drop files here or click to upload</div>
        <div class="text-sm fw-medium text-neutral-300">or click to browse files</div>
        <input ref="filesFieldRef" type="file" class="hidden" @change="onFiles($event)" multiple>
    </div>
</template>

<style scoped lang="scss">

</style>
