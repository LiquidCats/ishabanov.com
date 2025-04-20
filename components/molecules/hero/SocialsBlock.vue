<script setup lang="ts">

import AppLink from "~/components/atoms/AppLink.vue";
import type {Link as LinkType} from "~/types/link";

interface Props {
    item: LinkType
}
// Define
defineProps<Props>()
</script>

<template>
    <div class="bg-gradient-to-tl from-blue-600 to-purple-400 rounded-md justify-center flex items-center relative">
        <AppLink :to="item.link"
              :aria-label="item.text"
              :title="item.text"
              target="_blank"
              class="py-3 duration-300 flex flex-col items-center justify-center text-sm group/contact hover:!text-gray-50">
            <div class="absolute -inset-1" />
            <component :is="item.icon" class="size-10 md:duration-300 md:translate-y-1 md:group-hover/contact:-translate-y-1"/>
            <span class="md:duration-300 md:opacity-75 md:translate-y-1 md:group-hover/contact:translate-y-0 md:group-hover/contact:opacity-100 motion-reduce:transition-none">{{ item.text }}</span>
        </AppLink>
    </div>
</template>

<style scoped lang="scss">

</style>
