<script setup lang="ts">

import BlockRenderer from "~/components/molecules/article/blocks/BlockRenderer.vue";
import type {PostBlockResource} from "~/types/api";

interface Props {
    blockContent: PostBlockResource<any>[]
}

//define
defineProps<Props>()
</script>

<template>
    <div class="my-3 bg-night rounded-xl p-6">
        <BlockRenderer v-for="item in blockContent" :block="item" />
    </div>
</template>
