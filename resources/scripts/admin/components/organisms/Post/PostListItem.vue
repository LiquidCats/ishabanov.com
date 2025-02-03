<script setup lang="ts">

import {RouterLink} from "vue-router"
import usePostListState from "../../../states/posts";
import Btn from "../../atoms/Btn.vue";
import Tag from "../../atoms/Tag.vue";
import {Colors} from "../../../domain/types/colors";
import RouteNames from "../../../domain/enums/RouteNames";
import type  {Tag as TagType} from "../../../domain/types/data";
import Paper from "../../atoms/Paper.vue";
import DeleteButton from "../../molecules/Buttons/DeleteButton.vue";


const postsState = usePostListState()

interface Props {
    cachedPostId: number|null
    postId: number
    title: string
    preview?: string
    description: string
    publishedAt: string
    isDraft: boolean
    tags: Array<TagType>
}

defineProps<Props>()

</script>

<template>
    <Paper class="flex flex-col" :key="postId">
        <div class="flex mt-auto justify-end gap-2 mb-3">
            <div class="mr-auto">
                <Tag v-if="cachedPostId === postId" class="mr-1" type="secondary">cached</Tag>
                <Tag :type="Colors.dark">ID: {{ postId }}</Tag>
            </div>

            <Btn :icon="isDraft ? 'EyeIcon' : 'EyeSlashIcon'"
                 :type="isDraft ? 'success' : 'warning'"
                 @click="postsState.changeState(postId)"
                 :disabled="postsState.status.changingStateId.includes(postId)">
                {{ isDraft ? 'Publish' : 'Hide' }}
            </Btn>
            <DeleteButton @click="postsState.delete(postId)" :disabled="postsState.status.deletingId.includes(postId)">
                Delete
            </DeleteButton>
        </div>
        <div class="relative flex flex-col md:flex-row gap-3">
            <div>
                <div v-if="preview" class="shrink w-32 h-24 md:w-48 md:h-32 bg-zinc-600 rounded-md bg-no-repeat bg-cover"
                     :style="`background-image: url(${preview})`"/>
            </div>

            <div class="grow">
                <h2 class="text-xl dark:text-gray-50 font-bold m-0">
                    <RouterLink :to="{name: RouteNames.POST_EDIT, params: {post_id: postId}}">
                        <span class="absolute -inset-1"></span>
                        {{ title }}
                    </RouterLink>
                </h2>
                <small class="block mb-3 text-gray-400 text-xs">Published At: {{ publishedAt}}</small>
                <div class="flex gap-1 mb-3 flex-wrap w-full">
                    <Tag v-for="tag in tags" class="text-nowrap" :type="Colors.primary">{{ tag.name }}</Tag>
                </div>
                <div class="overflow-hidden line-clamp-2 dark:text-gray-50">
                   {{ description }}
                </div>
            </div>

        </div>

    </Paper>
</template>
