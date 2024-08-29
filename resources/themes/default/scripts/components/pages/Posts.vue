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
import {useRoute, useRouter} from "vue-router";
import {RouteNames} from "../../domain/enums/routes";
import Preloader from "../molecules/posts/items/Preloader.vue";

// Static
const postPreviewMap = {
    [PreviewTypeEnum.fill]: BackgroundPreviewPostItem,
    [PreviewTypeEnum.left_side]: LeftSidePreviewPostItem,
    default: NoPreviewPostItem
}

// State
const route = useRoute()
const router = useRouter()
const postsState = usePostsState()

// Actions
async function nextPage() {
    const currentPage = Number(route.params?.page) || 1
    await router.push({name: RouteNames.POST_LIST_PAGE, params:{page: currentPage+1}})
    await postsState.paginate(currentPage+1)
}

async function prevPage() {
    let currentPage = Number(route.params?.page) || 1
    if (currentPage <= 0) {
        currentPage = 1
    }
    await router.push({name: RouteNames.POST_LIST_PAGE, params:{page: currentPage-1}})
    await postsState.paginate(currentPage-1)
}

// hooks
onMounted(() => {
    const currentPage = Number(route.params?.page) || 1
    postsState.paginate(currentPage)
})
onUnmounted(() => {
    postsState.$reset()
})

</script>

<template>
    <section id="posts" class="grid grid-cols-1 gap-3 mb-3">
        <Preloader v-if="postsState.status.loading" v-for="i in 6" />
        <component v-if="postsState.status.loaded"
                   v-for="post in postsState.items"
                   :preview-image-url="post.previewImage?.path"
                   :post-id="post.id"
                   :is="postPreviewMap[post.preview_image_type] ?? postPreviewMap.default">
             <PostHeader :reading-time="post.reading_time"
                         published-at="2024-5-23">{{ post.title }}</PostHeader>
            <PostBody :tags="post.tags">{{ post.preview }}</PostBody>
            <PostFooter/>
        </component>
    </section>
    <section class="mb-3">
        <Pagination v-if="postsState.pagination.total > postsState.pagination.per_page" :pagination="postsState.pagination"
                    @click:next="nextPage"
                    @click:prev="prevPage"/>
    </section>
</template>
