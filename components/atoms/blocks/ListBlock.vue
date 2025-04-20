<script setup lang="ts">
import {ListStyleType} from "~/enums/blocks";
import type {PostBlockResource} from "~/types/api";
import BlockRenderer from "~/components/molecules/article/blocks/BlockRenderer.vue";
import List from "~/components/atoms/lists/List.vue";

interface Props {
    blockStyles: ListBlockStyles,
    blockContent: PostBlockResource<string>[]
}

interface ListBlockStyles {
    type: ListStyleType
}

//define
defineProps<Props>()
</script>

<template>
    <List :ordered="blockStyles.type === ListStyleType.ordered"
          class="mb-2"
          v-memo="[blockContent, blockStyles]">
        <BlockRenderer v-for="item in blockContent" :block="item" />
    </List>
</template>
