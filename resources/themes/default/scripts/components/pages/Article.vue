<script setup lang="ts">
import SocialPreview from "../atoms/SocialPreview.vue";
import SimilarArticle from "../molecules/article/SimilarArticle.vue";
import ArticleNav from "../molecules/article/ArticleNav.vue";
import ArticleFooter from "../molecules/article/ArticleFooter.vue";
import ArticleHeader from "../molecules/article/ArticleHeader.vue";
import BlockRenderer from "../molecules/article/blocks/BlockRenderer.vue";
import {onMounted, onUnmounted} from "vue";
import useArticleState from "../../states/article";
import {useRoute} from "vue-router";

const route = useRoute()
const articleState = useArticleState()

onMounted(() => {
    const postId: number = route?.params?.postId

    if (postId) {
        articleState.loadArticle(postId)
    }
})
onUnmounted(() => {
    articleState.$reset()
})

</script>

<template>
    <section id="post" v-if="articleState.status.loaded">
        <SocialPreview :title="articleState.item?.title"
                       :published-at="articleState.item?.published_at"
                       :description="articleState.item?.preview"
                       :image-url="articleState.item?.previewImage?.path" />
        <article class="container max-w-6xl mx-auto text-gray-50">
            <ArticleHeader :tags="articleState.item?.tags"
                           :published-at="articleState.item.published_at"
                           :reading-time="articleState.item.reading_time"
                           :image-url="articleState.item?.previewImage?.path">{{ articleState.item.title }}</ArticleHeader>
            <main class="mb-3">
                <BlockRenderer v-for="block in articleState.item.blocks" :block="block" />
            </main>
            <ArticleFooter v-if="articleState.meta.similar">
                <SimilarArticle v-for="post in articleState.meta.similar"
                                :published-at="post.published_at"
                                :post-id="post.id">
                    <template #title>{{ post.title }}</template>
                    <template #description>{{ post.preview }}</template>
                </SimilarArticle>
            </ArticleFooter>
            <div class="grid md:grid-cols-2 gap-3">
                <ArticleNav type="next" :post-id="13" title="Will AI take over my job in the future?" />
                <ArticleNav type="prev" :post-id="11" title="Unusual Yet Effective Optimizations" />
            </div>
        </article>
    </section>
</template>
