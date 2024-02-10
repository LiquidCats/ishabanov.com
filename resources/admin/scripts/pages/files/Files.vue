<script setup lang="ts">

import {onBeforeUnmount, onMounted, onUnmounted} from "vue";
//
import type {FileToUpload} from "../../types/internals";
import type {File} from "../../types/data";
//
import PageHeader from "../../components/molecules/PageHeader.vue";
import Btn from "../../components/atoms/Btn.vue";
import {Colors} from "../../types/colors";
import FilePreview from "./FilePreview.vue";
import DropZone from "./DropZone.vue";
import Pagination from "../../components/molecules/Pagination.vue";
import useFilesState from "../../states/files";
import FileRow from "./FileRow.vue";

const filesState = useFilesState()

onMounted(async () => {
    await filesState.paginate(1)
})

onBeforeUnmount(() => {
    for (const fileToUpload of filesState.previews) {
        if (fileToUpload.preview) {
            URL.revokeObjectURL(fileToUpload.preview)
        }
    }
})

onUnmounted(() => {
    filesState.$reset()
})

async function remove(file: File) {
    await filesState.remove(file.hash)
    if (filesState.status.filesDeleting.length === 0) {
        await filesState.paginate(1)
    }
}

async function upload(fileToUpload?: FileToUpload) {
    await filesState.upload(fileToUpload)
    await filesState.paginate(filesState.pagination.current_page)
}

</script>

<template>
    <PageHeader>Files</PageHeader>
    <div class="mb-3">
        <DropZone @files="filesState.createFilePreviews"/>
    </div>
    <div v-if="filesState.previews.length" class="mb-3">
        <Btn :type="Colors.primary"
             icon="upload"
             :class="{'disabled': filesState.status.filesUploading.length}"
             :disabled="filesState.status.filesUploading.length"
             @click.prevent="upload()">Upload All</Btn>
    </div>
    <div class="position-relative mb-3" v-if="filesState.previews.length">
        <FilePreview v-for="fileToUpload in filesState.previews"
                     :file="fileToUpload"
                     :is-uploading="filesState.status.filesUploading.includes(fileToUpload)"
                     @file:upload="upload"
                     @file:remove="filesState.removePreview"/>
    </div>
    <div v-if="filesState.previews.length" class="mb-3">
        <Btn :type="Colors.primary"
             icon="upload"
             :class="{'disabled': filesState.status.filesUploading.length}"
             :disabled="filesState.status.filesUploading.length"
             @click.prevent="upload()">Upload All</Btn>
    </div>
    <div class="container-fluid mb-3">
        <FileRow v-for="file in filesState.items"
                 :file="file"
                 :is-deleting="filesState.status.filesDeleting.includes(file.hash)"
                 @file:remove="remove"/>
    </div>
    <Pagination :links="filesState.pagination"/>
</template>

<style scoped lang="scss">

</style>
