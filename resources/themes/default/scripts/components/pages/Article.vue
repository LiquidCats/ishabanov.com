<script setup lang="ts">
import SocialPreview from "../atoms/SocialPreview.vue";
import {PostResource} from "../../domain/types/api";
import SimilarArticle from "../molecules/article/SimilarArticle.vue";
import ArticleNav from "../molecules/article/ArticleNav.vue";
import ArticleFooter from "../molecules/article/ArticleFooter.vue";
import ArticleHeader from "../molecules/article/ArticleHeader.vue";
import BlockRenderer from "../molecules/article/blocks/BlockRenderer.vue";

const postState = {
    similar: [
        {
            id: 1,
            published_at: "2024-03-28 11:11:11",
            title: "Entering IT (Part 3): Navigating the Software Engineer Interview Process",
            preview: "The field of software engineering is as exciting as it is challenging, offering endless opportunities for creative problem-solving and innovation. As you embark on your journey into this dynamic industry, one critical hurdle stands between you and your dream job: the interview process. This article aims to demystify the software engineer interview, offering a comprehensive guide on what to expect, from HR screening to the final offer, ensuring you walk into your interview prepared and confident."
        },
        {
            id: 1,
            published_at: "2024-03-28 11:11:11",
            title: "Entering IT (Part 3): Navigating the Software Engineer Interview Process",
            preview: "The field of software engineering is as exciting as it is challenging, offering endless opportunities for creative problem-solving and innovation. As you embark on your journey into this dynamic industry, one critical hurdle stands between you and your dream job: the interview process. This article aims to demystify the software engineer interview, offering a comprehensive guide on what to expect, from HR screening to the final offer, ensuring you walk into your interview prepared and confident."
        },
        {
            id: 1,
            published_at: "2024-03-28 11:11:11",
            title: "Entering IT (Part 3): Navigating the Software Engineer Interview Process",
            preview: "The field of software engineering is as exciting as it is challenging, offering endless opportunities for creative problem-solving and innovation. As you embark on your journey into this dynamic industry, one critical hurdle stands between you and your dream job: the interview process. This article aims to demystify the software engineer interview, offering a comprehensive guide on what to expect, from HR screening to the final offer, ensuring you walk into your interview prepared and confident."
        },
    ] as PostResource[],
    item: {
        id: 1,
        title: "Will AI take over my job in the future?",
        preview: "In the dynamic landscape of technology, Artificial Intelligence (AI) is no longer just a buzzword but a pivotal force reshaping the IT industry. As IT professionals, understanding the implications of AI is crucial not only for staying relevant but also for harnessing its potential to enhance our work. This article delves into how AI is integrated into various IT domains, addresses the prevalent concerns about job security, and highlights the evolving synergy between human intellect and machine learning.",
        published_at: "2020-05-01T00:00:00.000Z",
        reading_time: 9,
        previewImage: {
            path: "https://files.ishabanov.com/ishabanov/production/media/syWfeBY087amQ8SrkLD7JYJvnABJaBsUAfMBwcOs.jpg"
        },
        blocks: [
    {
        "key": "01914794-c9e9-7aad-834a-dd6028cdd265",
        "tag": "h2",
        "type": "heading",
        "styles": [
            "serif",
            "extralight",
            "3xl"
        ],
        "content": "test"
    },
    {
        "key": "01914794-c9e9-7aad-834a-e27f67bd45bf",
        "type": "paragraph",
        "styles": [],
        "content": "test"
    },
    {
        "key": "01914794-c9e9-7aad-834a-eb5c44b35f11",
        "type": "image",
        "styles": [],
        "content": {
            "alt": "lalala",
            "src": "https://images.unsplash.com/photo-1720048169707-a32d6dfca0b3?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            "caption": "test caption"
        }
    },
    {
        "key": "01914794-c9e9-7aad-834b-047cff609ad3",
        "tag": "ul",
        "type": "list",
        "style": [],
        "content": [
            {
                "key": "0191477b-83e8-7aa6-80fb-a3ecae7a57ab",
                "type": "list-item",
                "styles": [],
                "content": "test 1"
            },
            {
                "key": "0191477b-86da-7aa6-80fb-ab0a08b699e0",
                "type": "list-item",
                "styles": [],
                "content": "test 2"
            }
        ]
    },
    {
        "key": "01914794-c9e9-7aad-834b-08bd38ed351c",
        "type": "paragraph",
        "styles": [],
        "content": "test paragraph"
    },
    {
        "key": "01914794-c9e9-7aad-834b-10505937ffe2",
        "type": "code",
        "styles": [
            "bash"
        ],
        "content": "cd ../.."
    },
    {
        "key": "01914794-c9e9-7aad-834b-1c6f9f7db2f6",
        "type": "remark",
        "content": [
            {
                "key": "01915202-1937-7552-8603-b1bd21649bc6",
                "tag": "h1",
                "type": "heading",
                "styles": [
                    "serif",
                    "extralight",
                    "8xl"
                ],
                "content": "remark"
            },
            {
                "key": "01914794-e4d7-7aad-834b-2d35caf37600",
                "type": "paragraph",
                "styles": [
                    "bold",
                    "lg"
                ],
                "content": "remark test"
            }
        ]
    },
    {
        "key": "01914794-c9e9-7aad-834b-2565db844f1d",
        "type": "raw",
        "content": "<p>test raw block</p>"
    }
],
        tags: [
            {
                name: "test"
            }
        ]
    } as PostResource
}

</script>

<template>
    <section id="post">
        <SocialPreview :title="postState.item?.title"
                       :published-at="postState.item?.published_at"
                       :description="postState.item?.preview"
                       :image-url="postState.item?.previewImage?.path" />
        <article class="container max-w-6xl mx-auto text-gray-50">
            <ArticleHeader :tags="postState.item?.tags"
                           :published-at="postState.item.published_at"
                           :reading-time="postState.item.reading_time"
                           :image-url="postState.item?.previewImage?.path">{{ postState.item.title }}</ArticleHeader>
            <main>
                <BlockRenderer v-for="block in postState.item.blocks" :block="block" />
            </main>
            <ArticleFooter>
                <SimilarArticle v-for="post in postState.similar" :published-at="post.published_at" :post-id="post.id">
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
