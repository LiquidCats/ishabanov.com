<script setup lang="ts">
import PostHeader from "../molecules/posts/PostHeader.vue";
import PostFooter from "../molecules/posts/PostFooter.vue";
import PostBody from "../molecules/posts/PostBody.vue";
import NoPreviewPostItem from "../molecules/posts/items/NoPreviewPostItem.vue";
import BackgroundPreviewPostItem from "../molecules/posts/items/BackgroundPreviewPostItem.vue";
import LeftSidePreviewPostItem from "../molecules/posts/items/LeftSidePreviewPostItem.vue";
import Pagination from "../organisms/Pagination.vue";
import {PreviewTypeEnum} from "../../domain/enums/preview";
import usePostsState from "../../states/posts";
import {onMounted, onUnmounted, ref} from "vue";
import {useRoute} from "vue-router";

// Static
const postPreviewMap = {
    [PreviewTypeEnum.fill]: BackgroundPreviewPostItem,
    [PreviewTypeEnum.left_side]: LeftSidePreviewPostItem,
    default: NoPreviewPostItem
}

// State
const route = useRoute()
const postsState = usePostsState()
const page = ref<number>(route.params?.page || 1)

// hooks
onMounted(() => {
    postsState.paginate(page.value)
})
onUnmounted(() => {
    postsState.$reset()
})

</script>

<template>
    <section id="posts" class="grid grid-cols-1 gap-3 mb-3">
        <div v-if="postsState.status.loading" class="accent-gray-50 text-5xl">Loading...</div>
        <component v-if="postsState.status.loaded"
                   v-for="post in postsState.items"
                   :preview-image-url="post.previewImage.path"
                   :post-id="post.id"
                   :is="postPreviewMap[post.preview_image_type] ?? postPreviewMap.default">
             <PostHeader :reading-time="post.reading_time"
                         published-at="2024-5-23">{{ post.title }}</PostHeader>
            <PostBody :tags="post.tags">{{ post.preview }}</PostBody>
            <PostFooter/>
        </component>
    </section>
    <section class="mb-3">
        <Pagination :pagination="postsState.pagination"
                    @click:next="postsState.paginate(page-1)"
                    @click:prev="postsState.paginate(page+1)"/>
    </section>
</template>
