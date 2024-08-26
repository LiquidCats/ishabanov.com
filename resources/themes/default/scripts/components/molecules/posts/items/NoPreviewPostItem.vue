<script setup lang="ts">

import AppLink from "../../../atoms/AppLink.vue";
import {RouteNames} from "../../../../domain/enums/routes";

interface Props {
    postId: number
}
// define
defineProps<Props>()
</script>

<template>
    <article class="rounded-md bg-night group p-6 relative z-0">
        <AppLink :to="{name: RouteNames.POST_ARTICLE, params: {postId}}" class="absolute -inset-1"/>
        <div class="grid grid-cols-1">
            <slot></slot>
        </div>
    </article>
</template>
