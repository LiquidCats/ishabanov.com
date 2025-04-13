<script setup lang="ts">

import Background from "@/components/atoms/illustration/Background.vue";
import AppLink from "@/components/atoms/AppLink.vue";
import {AppRoutes} from "@/enums/routes";

interface Props {
    postId: number
    previewImageUrl: string
}
// define
defineProps<Props>()
</script>

<template>

    <article class="rounded-md overflow-clip group relative z-0 m-0">
        <Background class="block z-0 absolute -inset-1 group-hover:-inset-8 duration-700 ease-in-out"
                    :src="previewImageUrl"/>
        <div class="grid grid-cols-1 relative z-10 bg-gradient-to-t from-night to-night/[.7] backdrop-blur group-hover:backdrop-blur-0 duration-700 ease-in-out p-6 pt-40">
            <slot></slot>
        </div>
        <AppLink :to="{name: AppRoutes.POST_ARTICLE, params: {postId}}" class="absolute -inset-1 z-10"/>

    </article>
</template>
