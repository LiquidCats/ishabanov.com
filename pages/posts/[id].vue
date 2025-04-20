<script setup lang="ts">
import SimilarArticle from "~/components/molecules/article/SimilarArticle.vue";
import ArticleNav from "~/components/molecules/article/ArticleNav.vue";
import ArticleFooter from "~/components/molecules/article/ArticleFooter.vue";
import ArticleHeader from "~/components/molecules/article/ArticleHeader.vue";
import BlockRenderer from "~/components/molecules/article/blocks/BlockRenderer.vue";
//
import {posts} from "~/states/static";
import type {PostMeta, PostResource} from "~/types/api";

// Dynamic parameters: type (e.g. "post" or "page"), id
const route = useRoute()
const router = useRouter()
const id = route.params.id as string
const key = `post-${id}`

// Lookup in static stores
const record = (posts as Record<string, any>)[key]

// 404 if not found
if (!record) {
  router.replace('/404')
}

// Extract data and meta
const item = record.data as PostResource
const meta = record.meta as PostMeta

useSeoMeta({
  titleTemplate: (titleChunk) => `${titleChunk} - Posts - ${item?.title}`,
  description: item?.preview,
  //
  ogTitle: item?.title,
  ogDescription: item?.preview,
  ogImage: item?.previewImage?.path,
  //
  twitterCard: "summary_large_image",
  twitterTitle: item?.title,
  twitterDescription: item?.preview,
  twitterImage: item?.previewImage?.path,
})

</script>

<template>
  <section id="post" v-if="item?.id">
    <article class="container max-w-6xl mx-auto text-gray-50">
      <ArticleHeader :tags="item.tags"
                     :published-at="item.published_at"
                     :reading-time="item.reading_time"
                     :image-url="item?.previewImage?.path">{{ item.title }}</ArticleHeader>
      <main class="mb-3">
        <BlockRenderer v-for="block in item.blocks" :block="block" />
      </main>
      <ArticleFooter v-if="meta?.similar?.length">
        <SimilarArticle v-for="post in meta?.similar"
                        :published-at="post.published_at as string"
                        :post-id="post.id as number"
                        :title="post.title as string"
                        :description="post.preview as string">
        </SimilarArticle>
      </ArticleFooter>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
        <ArticleNav class="md:col-start-1" v-if="meta?.next"
                    type="next"
                    :post-id="meta.next.id as number"
                    :title="meta.next.title as string" />
        <ArticleNav class="md:col-start-2" v-if="meta?.previous"
                    type="prev"
                    :post-id="meta.previous.id as number"
                    :title="meta.previous.title as string" />
      </div>
    </article>
  </section>
</template>
