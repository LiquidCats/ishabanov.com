<script setup lang="ts">

import {RouterLink} from "vue-router"
import Tag from "../../atoms/Tag.vue";
import {Colors} from "../../../types/colors";
import RouteNames from "../../../enums/RouteNames";
import type  {Tag as TagType} from "../../../types/data";

interface Props {
    postId: number
    title: string
    publishedAt: string
    tags: Array<TagType>
}

defineProps<Props>()

</script>

<template>
    <div class="flex flex-col border rounded-md p-3 dark:border-stone-700 border-stone-300 bg-neutral-100 dark:bg-zinc-700" :key="postId">
        <div class="relative">
            <Tag :type="Colors.dark">ID: {{ postId }}</Tag>
            <h2 class="text-3xl dark:text-gray-50 font-bold">
                <RouterLink :to="{name: RouteNames.POST_EDIT, params: {post_id: postId}}">
                    <span class="absolute -inset-1"></span>
                    {{ title }}
                </RouterLink>
            </h2>
            <div class="mb-3 text-gray-400 text-sm">Published At: {{ publishedAt}}</div>
            <div class="flex gap-2 mb-3 flex-wrap">
                <Tag v-for="tag in tags" class="text-nowrap" :type="Colors.primary">{{ tag.name }}</Tag>
            </div>
        </div>
        <div class="flex mt-auto justify-end gap-2 border-t border-stone-300 pt-2">
            <slot/>
        </div>
    </div>
</template>

<style scoped lang="scss">

</style>
