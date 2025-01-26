<script setup lang="ts">
import SocialPreview from "../atoms/SocialPreview.vue";
import SimilarArticle from "../molecules/article/SimilarArticle.vue";
import ArticleNav from "../molecules/article/ArticleNav.vue";
import ArticleFooter from "../molecules/article/ArticleFooter.vue";
import ArticleHeader from "../molecules/article/ArticleHeader.vue";
import BlockRenderer from "../molecules/article/blocks/BlockRenderer.vue";
import {onMounted, onUnmounted, onBeforeUpdate} from "vue";
import useArticleState from "../../states/article";
import {useRoute} from "vue-router";

const route = useRoute()
const articleState = useArticleState()

onBeforeUpdate(() => {
    const postId = route?.params?.postId
    if (String(articleState.id) === postId) {
        console.log(postId)
        return postId
    }

    if (postId) {
        articleState.loadArticle(Number(postId))
    }
})
onMounted(() => {
    const postId = route?.params?.postId

    if (postId) {
        articleState.loadArticle(Number(postId))
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
            <ArticleFooter v-if="articleState.meta.similar.length">
                <SimilarArticle v-for="post in articleState.meta.similar"
                                :published-at="post.published_at"
                                :post-id="post.id"
                                :title="post.title"
                                :description="post.preview">
                </SimilarArticle>
            </ArticleFooter>
            <div class="grid md:grid-cols-2 gap-3">
                <ArticleNav class="col-start-1" v-if="articleState.meta.next"
                            type="next"
                            :post-id="articleState.meta.next.id"
                            :title="articleState.meta.next.title" />
                <ArticleNav class="col-start-2" v-if="articleState.meta.prev"
                            type="prev"
                            :post-id="articleState.meta.prev.id"
                            :title="articleState.meta.prev.title" />
            </div>
        </article>
    </section>
</template>
