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
import {onMounted} from "vue";


const postsState = usePostsState()

const postPreviewMap = {
    [PreviewTypeEnum.fill]: BackgroundPreviewPostItem,
    [PreviewTypeEnum.left_side]: LeftSidePreviewPostItem,
    default: NoPreviewPostItem
}

// hooks
onMounted(() => {
    postsState.loadPrev()
    postsState.loadNext()
})

</script>

<template>
    <section id="posts" class="grid grid-cols-1 gap-3 mb-3">
        <component v-for="post in postsState.current.items"
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
        <Pagination :pagination="postsState.current.pagination"
                    @click:next=""
                    @click:prev=""/>
    </section>
</template>
