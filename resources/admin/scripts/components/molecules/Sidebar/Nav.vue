<script setup lang="ts">

import Link from "./Link.vue";
import LinkToRoute from "./LinkToRoute.vue";
import {ArrowUturnLeftIcon} from "@heroicons/vue/20/solid";
import {useRouter} from "vue-router";

const routes = useRouter()
    .getRoutes()
    .filter(r => r!.meta?.isPrimary)
    .filter(r => !r.aliasOf);
</script>

<template>
    <ul class="list-none flex flex-row gap-1 md:flex-col justify-center">
        <li aria-current="page" class="hidden md:block">
            <Link class="p-3">
                <ArrowUturnLeftIcon class="size-7 md:size-5"/>
                <span class="hidden md:inline">To Site</span>
            </Link>
        </li>
        <li v-for="r in routes" aria-current="page" :key="r.path">
            <LinkToRoute :to="{name: r.name}" class="p-3">
                <component :is="r.meta?.icon" class="size-7 md:size-5" />
                <span class="hidden md:inline">{{ r.meta?.title }}</span>
            </LinkToRoute>
        </li>
    </ul>
</template>

<style scoped lang="scss">

</style>
