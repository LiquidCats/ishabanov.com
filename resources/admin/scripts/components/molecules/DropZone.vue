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
    <div class="block border-dashed border-4 px-4 py-8 rounded-xl text-center duration-300 dark:bg-stone-800 bg-stone-100 cursor-pointer"
         :class="{
             'border-stone-300 dark:border-stone-600': !dropZoneActive,
             'border-green-400 dark:border-green-700': dropZoneActive,
         }"
         @click="openFileSelector"
         @dragover.prevent="dropZoneActive = true"
         @dragleave.prevent="dropZoneActive = false"
         @drop.prevent="onFiles($event)">
        <div class="text-xl fw-medium dark:text-neutral-300 text-neutral-600">Drop files here or click to upload</div>
        <div class="text-sm fw-medium dark:text-neutral-300 text-neutral-600">or click to browse files</div>
        <input ref="filesFieldRef" type="file" class="hidden" @change="onFiles($event)" multiple>
    </div>
</template>

<style scoped lang="scss">

</style>
