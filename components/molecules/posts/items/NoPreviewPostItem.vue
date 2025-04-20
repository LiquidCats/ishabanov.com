<script setup lang="ts">

import AppLink from "~/components/atoms/AppLink.vue";
import {AppRoutes} from "~/enums/routes";

interface Props {
    postId: number
}
// define
defineProps<Props>()
</script>

<template>
    <article class="rounded-md bg-night group p-6 relative z-0">
        <AppLink :to="`/posts/${postId}`" class="absolute -inset-1"/>
        <div class="grid grid-cols-1">
            <slot></slot>
        </div>
    </article>
</template>
