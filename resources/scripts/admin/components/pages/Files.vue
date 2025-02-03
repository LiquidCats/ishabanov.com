<script setup lang="ts">

import {onBeforeUnmount, onMounted, onUnmounted} from "vue";
//
import PageHeader from "../molecules/PageHeader.vue";
import Pagination from "../molecules/Pagination.vue";
import useFilesState from "../../states/files";
import FileRow from "../molecules/File/FileRow.vue";
import FileUploader from "../organisms/FileUploader.vue";
import Backdrop from "../atoms/Backdrop.vue";
import LoadingPlaceholder from "../atoms/LoadingPlaceholder.vue";
import NothingFound from "../atoms/NothingFound.vue";

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
    <PageHeader class="mt-3">Files</PageHeader>

    <Backdrop class="mb-3 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
        <FileUploader class="md:col-span-2 lg:col-span-3 mb-3"/>

        <LoadingPlaceholder class="md:col-span-2 lg:col-span-3" v-if="filesState.status.filesLoading" />
        <NothingFound class="md:col-span-2 lg:col-span-3" v-else-if="filesState.items.length === 0"/>
        <FileRow v-for="file in filesState.items"
                 :file="file"
                 :is-disabled="filesState.status.filesDeleting.includes(file.hash)"
                 @file:remove="filesState.remove($event.hash)"/>
    </Backdrop>
    <Pagination class="mx-3" :links="filesState.pagination"/>
</template>

<style scoped lang="scss">

</style>
