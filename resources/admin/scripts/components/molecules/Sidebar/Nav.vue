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
    <ul class="grid grid-cols-5 grid-rows-1 gap-1 md:grid-cols-1 md:grid-rows-5">
        <li aria-current="page" class="hidden md:block">
            <Link class="p-2 block text-center">
                <ArrowUturnLeftIcon class="size-5 mx-auto"/>
                <span class="text-xs whitespace-nowrap text-gray-500">To Site</span>
            </Link>
        </li>
        <li v-for="r in routes" aria-current="page" :key="r.path">
            <LinkToRoute :to="{name: r.name}" class="p-2 block text-center">
                <component :is="r.meta?.icon" class="size-5 mx-auto" />
                <span class="text-xs whitespace-nowrap text-gray-500">{{ r.meta?.title }}</span>
            </LinkToRoute>
        </li>
    </ul>
</template>

<style scoped lang="scss">

</style>
