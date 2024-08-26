<script setup lang="ts">
import {PostBlockResource} from "../../../domain/types/api";
import BlockRenderer from "../../molecules/article/blocks/BlockRenderer.vue";
import List from "../lists/List.vue";

interface Props {
    tag: 'ul'|'ol'
    blockClasses: string
    blockContent: PostBlockResource<string>[]
}

//define
defineProps<Props>()
</script>

<template>
    <List :ordered="tag === 'ol'" :class="blockClasses" v-memo="[blockClasses, blockContent, tag]">
        <BlockRenderer v-for="item in blockContent" :block="item" />
    </List>
</template>
