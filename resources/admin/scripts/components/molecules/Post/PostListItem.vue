<script setup lang="ts">

import {RouterLink} from "vue-router"
import Tag from "../../atoms/Tag.vue";
import {Colors} from "../../../types/colors";
import RouteNames from "../../../enums/RouteNames";
import type  {Tag as TagType} from "../../../types/data";

interface Props {
    postId: number
    title: string
    preview?: string
    description: string
    publishedAt: string
    tags: Array<TagType>
}

defineProps<Props>()

</script>

<template>
    <div class="flex flex-col rounded-md p-3 bg-neutral-50 dark:bg-zinc-700" :key="postId">
        <div class="flex mt-auto justify-end gap-2 mb-3">
            <div class="mr-auto">
                <Tag :type="Colors.dark">ID: {{ postId }}</Tag>
            </div>

            <slot/>
        </div>
        <div class="relative flex flex-row gap-3">
            <div>
                <div v-if="preview" class="shrink w-32 h-24 md:w-48 md:h-32 bg-zinc-600 rounded-md bg-no-repeat bg-cover"
                     :style="`background-image: url(${preview})`"/>
            </div>

            <div class="">
                <h2 class="text-xl dark:text-gray-50 font-bold m-0">
                    <RouterLink :to="{name: RouteNames.POST_EDIT, params: {post_id: postId}}">
                        <span class="absolute -inset-1"></span>
                        {{ title }}
                    </RouterLink>
                </h2>
                <small class="block mb-3 text-gray-400 text-xs">Published At: {{ publishedAt}}</small>
                <div class="flex gap-1 mb-3 flex-wrap">
                    <Tag v-for="tag in tags" class="text-nowrap" :type="Colors.primary">{{ tag.name }}</Tag>
                </div>
               <div class="line-clamp-2">{{ description }}</div>
            </div>

        </div>

    </div>
</template>

<style scoped lang="scss">

</style>
