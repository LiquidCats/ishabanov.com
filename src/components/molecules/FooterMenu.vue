<script setup lang="ts">

import Text from "@/components/atoms/typography/Text.vue";
import AppLink from "@/components/atoms/AppLink.vue";
import type {Link as LinkType} from "@/types/link";
import {AppRoutes} from "@/enums/routes";
import {computed} from "vue";

interface Props {
    links: Array<LinkType>
}

// define
const props = defineProps<Props>()
// state
const routeNames = Object.values(AppRoutes)
// compute
const items = computed(() => props.links.map((i: LinkType) => {
    return {
        link: routeNames.includes(i.link as AppRoutes) ? {name: i.link} : i.link,
        icon: i.icon,
        text: i.text,
    }
}))
</script>

<template>
    <div>
        <Text as="div" class="mb-3 text-gray-500"><slot/></Text>
        <AppLink v-for="item in items" :to="item.link" class="flex items-center gap-1">
            <component :is="item.icon" class="size-4"/>
            {{ item.text }}
        </AppLink>
    </div>
</template>
