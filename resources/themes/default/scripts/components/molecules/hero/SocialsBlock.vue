<script setup lang="ts">

import {ArrowUpRightIcon} from "@heroicons/vue/24/outline";
import Link from "../../atoms/Link.vue";
import type {Link as LinkType} from "../../../domain/types/link";

interface Props {
    socials: Array<LinkType>
}
// Define
defineProps<Props>()
</script>

<template>
    <div v-for="item in socials" class="bg-gradient-to-tl from-blue-500 to-purple-500 rounded-md justify-center flex items-center relative">
        <Link :href="item.link"
              :aria-label="item.text"
              :title="item.text"
              target="_blank"
              class="py-3 duration-300 flex flex-col items-center justify-center text-sm group/contact">
            <div class="absolute -inset-1" />
            <ArrowUpRightIcon class="size-10 md:duration-300 md:translate-y-3.5 md:group-hover/contact:translate-y-0" />
            <span class="md:duration-300 md:opacity-0 md:-translate-y-3.5 md:group-hover/contact:translate-y-0 md:group-hover/contact:opacity-100 motion-reduce:transition-none">{{ item.text }}</span>
        </Link>
    </div>
</template>

<style scoped lang="scss">

</style>
