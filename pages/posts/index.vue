<script setup lang="ts">

import PostFooter from "~/components/molecules/posts/PostFooter.vue";
import PostBody from "~/components/molecules/posts/PostBody.vue";
import PostHeader from "~/components/molecules/posts/PostHeader.vue";
import BackgroundPreviewPostItem from "~/components/molecules/posts/items/BackgroundPreviewPostItem.vue";
import LeftSidePreviewPostItem from "~/components/molecules/posts/items/LeftSidePreviewPostItem.vue";
import NoPreviewPostItem from "~/components/molecules/posts/items/NoPreviewPostItem.vue";
//
import {posts} from "~/states/static";
import type {PostResource} from "~/types/api";
import {PreviewTypes} from "~/enums/preview";


useSeoMeta({
  titleTemplate: (titleChunk) => `${titleChunk} - Posts`,
})

const postPreviewMap = {
  [PreviewTypes.fill]: BackgroundPreviewPostItem,
  [PreviewTypes.left_side]: LeftSidePreviewPostItem,
  default: NoPreviewPostItem
}

// State
const items: PostResource[] = Object.keys(posts)
    .map(k => posts[k].data as PostResource);

</script>

<template>
  <section id="posts" class="grid grid-cols-1 gap-3 mb-3">
    <component v-for="post in items"
               :preview-image-url="post.previewImage?.path"
               :post-id="post.id"
               :is="postPreviewMap[post?.preview_image_type ?? 'default']">
      <PostHeader :reading-time="post.reading_time"
                  published-at="2024-5-23">{{ post.title }}</PostHeader>
      <PostBody :tags="post.tags">{{ post.preview }}</PostBody>
      <PostFooter/>
    </component>
  </section>
</template>