<script setup lang="ts">

import {ArrowUpOnSquareIcon} from "@heroicons/vue/20/solid";
import DropZone from "../molecules/DropZone.vue";
import {Colors} from "../../types/colors";
import FilePreview from "../molecules/File/FilePreview.vue";
import Btn from "../atoms/Btn.vue";
import type {FileToUpload} from "../../types/internals";
import useFilesState from "../../states/files";

const filesState = useFilesState()

async function upload(fileToUpload?: FileToUpload) {
    await filesState.upload(fileToUpload)
    await filesState.paginate(filesState.pagination.current_page)
}

</script>

<template>
    <div class="flex flex-col gap-3 items-stretch">
        <div>
            <DropZone @files="filesState.createFilePreviews"/>
        </div>
        <div v-if="filesState.previews.length">
            <Btn :type="Colors.primary"
                 class="w-full"
                 :disabled="filesState.status.filesUploading.length === 0"
                 @click.prevent="upload()">
                <ArrowUpOnSquareIcon class="size-6"/> Upload All
            </Btn>
        </div>
        <div class="relative grid grid-cols-2 gap-2"
             v-if="filesState.previews.length">
            <FilePreview v-for="fileToUpload in filesState.previews"
                         :file="fileToUpload"
                         :is-uploading="filesState.status.filesUploading.includes(fileToUpload)"
                         @file:upload="upload"
                         @file:remove="filesState.removePreview"/>
        </div>
        <div v-if="filesState.previews.length">
            <Btn :type="Colors.primary"
                 class="w-full"
                 :disabled="filesState.status.filesUploading.length === 0"
                 @click.prevent="upload()">
                <ArrowUpOnSquareIcon class="size-6"/> Upload All
            </Btn>
        </div>
    </div>
</template>

<style scoped lang="scss">

</style>
