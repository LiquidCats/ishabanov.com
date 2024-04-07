<script setup lang="ts">

import {onBeforeUnmount, onMounted, onUnmounted} from "vue";
//
import PageHeader from "../../components/molecules/PageHeader.vue";
import Pagination from "../../components/molecules/Pagination.vue";
import useFilesState from "../../states/files";
import FileRow from "./FileRow.vue";
import FileUploader from "../../components/organisms/FileUploader.vue";

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

</script>

<template>
    <PageHeader class="mb-3 mx-3">Files</PageHeader>
    <FileUploader class="mb-3 mx-3"/>
    <div class="mb-3 mx-3 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2">
        <FileRow v-for="file in filesState.items"
                 :file="file"
                 :is-deleting="filesState.status.filesDeleting.includes(file.hash)"
                 @file:remove="filesState.remove($event.hash)"/>
    </div>
    <Pagination class="mx-3" :links="filesState.pagination"/>
</template>

<style scoped lang="scss">

</style>
