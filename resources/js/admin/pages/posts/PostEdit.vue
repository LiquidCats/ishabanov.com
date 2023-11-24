<script setup lang="ts">

import {onMounted} from "vue";
import {useRoute, useRouter} from "vue-router";
//
import PageHeader from "../../components/PageHeader.vue";
import Tag from "../../components/Tag.vue";
import Btn from "../../components/Btn.vue";
import PostForm from "./PostForm.vue";
import usePostEditState from "../../states/pages/posts/edit";
import useImagesState from "../../states/images";

const postEditState = usePostEditState()
const imagesState = useImagesState()

const route = useRoute()
const router = useRouter()

onMounted(async () => {
    const postId: number = route?.params?.id as number
    await imagesState.load()
    await postEditState.loadPost(postId)
})

</script>

<template>
    <PageHeader><Tag type="dark">ID: 1</Tag> {{ postEditState.item.title }}</PageHeader>
    <div class="mb-3 d-flex gap-2">
        <Btn type="dark" icon="arrow-left" @click="router.back()">Back</Btn>
        <Btn type="primary" icon="floppy">Save</Btn>
    </div>
    <PostForm :post="postEditState.item"
              :preview-images="imagesState.items"
              :preview-types="postEditState.previewTypes" :tags="[]"/>
    <div class="mb-3 d-flex gap-2">
        <Btn type="dark" icon="arrow-left" @click="router.back()">Back</Btn>
        <Btn type="primary" icon="floppy">Save</Btn>
    </div>
</template>

<style scoped>

</style>
