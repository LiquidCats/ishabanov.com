<script setup lang="ts">

import Tag from "../../components/atoms/Tag.vue";
import {Post} from "../../types/data";
import {Colors} from "../../types/colors";
import RouteNames from "../../enums/RouteNames";

interface Props {
    post: Post
}

defineProps<Props>()

</script>

<template>
    <div class="border rounded-md p-3 border-stone-700 bg-stone-800" :key="post.id">
        <Tag :type="Colors.dark">ID: {{ post.id}}</Tag>
        <h2 class="text-3xl text-white font-bold">
            <router-link :to="{name: RouteNames.POST_EDIT, params: {post_id: post.id}}">{{ post.title }}</router-link>
        </h2>
        <div class="mb-3 text-gray-400 text-sm">Published At: {{ post.published_at}}</div>
        <div class="flex gap-2 mb-3">
            <Tag v-for="tag in post.tags" :type="Colors.primary">{{ tag.name }}</Tag>
        </div>
        <div class="flex justify-end gap-2 border-t border-stone-700 pt-2">
            <slot/>
        </div>
    </div>
</template>

<style scoped lang="scss">

</style>
