<script setup lang="ts">

import {computed, onMounted, onUnmounted, toValue} from "vue";
import {useRoute, useRouter} from "vue-router";
//
import PageHeader from "../../components/molecules/PageHeader.vue";
import Tag from "../../components/atoms/Tag.vue";
import PostForm from "./PostForm.vue";
//
import usePostState from "../../states/post";
import useImagesState from "../../states/images";
import useTagsState from "../../states/tags";
import RouteNames from "../../enums/RouteNames";
import PostButtons from "../../components/molecules/PageButtons.vue";
import {Colors} from "../../types/colors";

const postState = usePostState()
const imagesState = useImagesState()
const tagsState = useTagsState()

const route = useRoute()
const router = useRouter()

const postId: number = parseInt(route?.params?.post_id?.toString())

onMounted(async () => {
    await tagsState.search()
    await imagesState.load()
    if (route.name === RouteNames.POST_EDIT) {
        await postState.load(postId)
    }
})

onUnmounted(() => {
    postState.$reset()
})

async function savePost() {
    await postState.save(router)
}

const shouldDisable = computed(() =>
    postState.status.postLoading
    || postState.status.postSaving
    || imagesState.status.imagesLoading
    || imagesState.status.imagesUploading
    || tagsState.status.tagsLoading
)

</script>

<template>
    <PageHeader class="mb-3 flex items-end gap-2">
        <Tag class="text-3xl" v-if="postId" :type="Colors.dark">ID: {{ postId }}</Tag>
        <Tag class="text-3xl" v-if="!postId" :type="Colors.dark">Post:</Tag> {{ postState.item.title }}
    </PageHeader>
    <PostButtons class="mb-3" @click:save="savePost()" :disable="shouldDisable"/>
    <PostForm :post="postState.item"
              :errors="postState.errors"
              :preview-images="imagesState.items"
              :preview-types="postState.previewTypes"
              :tags="tagsState.items"/>
    <PostButtons class="mb-3" @click:save="savePost()" :disable="shouldDisable"/>
</template>

<style scoped lang="scss">

</style>
