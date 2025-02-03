<script setup lang="ts">

import {TextSize} from "@kernel/enums/text";
import AppLink from "../../atoms/AppLink.vue";
import {ArrowUpRightIcon} from "@heroicons/vue/24/outline";
import Text from "../../atoms/typography/Text.vue";
import {RouteNames} from "../../../domain/enums/routes";
</script>

<template>
    <div class="p-5 bg-gray-50 flex flex-col justify-between items-center gap-3 rounded-xl relative">
        <AppLink :to="{name: RouteNames.POST_LIST}"
                 class="ml-auto opacity-50 hover:opacity-100 duration-300 group/blog">
            <div class="absolute -inset-1" />
            <ArrowUpRightIcon class="text-gray-800 size-8 duration-300 group-hover/blog:-translate-y-1 group-hover/blog:translate-x-1 group-focus-visible/blog:-translate-y-1 group-focus-visible/blog:translate-x-1 motion-reduce:transition-none" />
        </AppLink>
        <Text as="div" :size="TextSize.xl" class="text-gray-800">Unveil the Secrets to Success: Explore My Exclusive Insights and Expert Tips!</Text>
    </div>
</template>
