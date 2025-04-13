<script setup lang="ts">
import {ref, onMounted, watch} from "vue";
import {useRoute} from "vue-router";
//
import SocialPreview from "@/pages/public/atoms/SocialPreview.vue";
import SimilarArticle from "@/pages/public/molecules/article/SimilarArticle.vue";
import ArticleNav from "@/pages/public/molecules/article/ArticleNav.vue";
import ArticleFooter from "@/pages/public/molecules/article/ArticleFooter.vue";
import ArticleHeader from "@/pages/public/molecules/article/ArticleHeader.vue";
import BlockRenderer from "@/pages/public/molecules/article/blocks/BlockRenderer.vue";
//
import type {PostMeta, PostResource} from "@/types/api";
import {posts} from "@/states/static";

const route = useRoute()

const postId = ref<string>(route?.params?.postId as string);

const item = ref<PostResource>({} as PostResource)
const meta = ref<PostMeta>({} as PostMeta)

watch(postId, (newPostId, oldPostId) => {
  if (newPostId !== oldPostId) {

    setItems(newPostId)
  }
})

onMounted(() => {

  setItems(route?.params?.postId as string)
})

function setPostId(id: string) {
  postId.value = id
}

function setItems(id: string) {
  const key = `post-${id}`
  item.value = posts[key]?.data as PostResource
  meta.value = posts[key]?.meta as PostMeta
}

</script>

<template>
    <section id="post" v-if="item?.id">
        <SocialPreview :title="item.title"
                       :published-at="item.published_at"
                       :description="item.preview"
                       :image-url="item?.previewImage?.path" />
        <article class="container max-w-6xl mx-auto text-gray-50">
            <ArticleHeader :tags="item.tags"
                           :published-at="item.published_at"
                           :reading-time="item.reading_time"
                           :image-url="item?.previewImage?.path">{{ item.title }}</ArticleHeader>
            <main class="mb-3">
                <BlockRenderer v-for="block in item.blocks" :block="block" />
            </main>
            <ArticleFooter v-if="meta.similar.length">
                <SimilarArticle v-for="post in meta.similar"
                                :published-at="post.published_at as string"
                                :post-id="post.id as number"
                                :title="post.title as string"
                                :description="post.preview as string">
                </SimilarArticle>
            </ArticleFooter>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <ArticleNav class="md:col-start-1" v-if="meta.next"
                            @click:post-nav="setPostId($event)"
                            type="next"
                            :post-id="meta.next.id as number"
                            :title="meta.next.title as string" />
                <ArticleNav class="md:col-start-2" v-if="meta.previous"
                            type="prev"
                            @click:post-nav="setPostId($event)"
                            :post-id="meta.previous.id as number"
                            :title="meta.previous.title as string" />
            </div>
        </article>
    </section>
</template>
