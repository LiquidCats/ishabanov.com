<script setup lang="ts">
import Background from "../../../atoms/illustration/Background.vue";
import AppLink from "../../../atoms/AppLink.vue";
import {RouteNames} from "../../../../domain/enums/routes";

interface Props {
    postId: number
    previewImageUrl: string
}
// define
defineProps<Props>()
</script>

<template>
    <article class="rounded-md bg-night overflow-hidden group relative p-3">
        <AppLink :to="{name: RouteNames.POST_ARTICLE, params: {postId}}" class="absolute -inset-1"/>
        <div class="grid grid-cols-1 grid-rows-2 co md:grid-cols-3 md:grid-rows-1 gap-3 md:gap-6">
            <Background :src="previewImageUrl" class="rounded-sm"/>
            <div class="md:col-span-2">
                <slot></slot>
            </div>
        </div>
    </article>
</template>
