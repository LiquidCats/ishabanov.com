<script setup lang="ts">

import Link from "./Link.vue";
import LinkToRoute from "./LinkToRoute.vue";
import {ArrowUturnLeftIcon} from "@heroicons/vue/20/solid";
import {useRouter} from "vue-router";

const routes = useRouter().getRoutes().filter(r => r!.meta?.isPrimary)

</script>

<template>
    <ul class="sticky top-3 list-none">
        <li aria-current="page">
            <Link><ArrowUturnLeftIcon class="size-5"/> To Site</Link>
        </li>
        <li v-for="r in routes" aria-current="page" :key="r.path">
            <LinkToRoute :to="{name: r.name}">
                <component :is="r.meta?.icon" class="size-5" />
                {{ r.meta?.title }}
            </LinkToRoute>
        </li>
    </ul>
</template>

<style scoped lang="scss">

</style>
