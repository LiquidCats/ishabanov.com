<script setup lang="ts">

import LogoLink from "@/components/organisms/LogoLink.vue";
import AppLink from "@/components/atoms/AppLink.vue";
import type {Link} from "@/types/link";

interface Props {
    links: Array<Link>
}

// define
defineProps<Props>()
</script>

<template>
    <nav class="flex items-center max-h-20 py-3 bg-zinc-900">
        <div>
            <LogoLink :size="6"></LogoLink>
        </div>
        <div class="ml-auto">
            <ul class="list-none flex gap-3">
                <li v-for="item in links">
                    <AppLink class="block py-3"
                             :to="{name: item.link}"
                             aria-current="page">{{ item.text }}</AppLink>
                </li>
            </ul>
        </div>
    </nav>
</template>

<style scoped lang="scss">

</style>
