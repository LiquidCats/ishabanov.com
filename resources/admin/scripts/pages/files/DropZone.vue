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
    <div class="d-block border border-1 p-4 rounded-3 text-center"
         :class="{'border-light-subtle': !dropZoneActive, 'border-success-subtle': dropZoneActive}"
         style="cursor: pointer"
         @click="openFileSelector"
         @dragover.prevent="dropZoneActive = true"
         @dragleave.prevent="dropZoneActive = false"
         @drop.prevent="onFiles($event)">
        <span class="fs-3 fw-lighter">Drop files here or click to upload</span>
        <input ref="filesFieldRef" type="file" class="d-none" @change="onFiles($event)" multiple>
    </div>
</template>

<style scoped lang="scss">

</style>
