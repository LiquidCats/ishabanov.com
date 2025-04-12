<script setup lang="ts">
import {ListStyleType} from "@/enums/blocks";
import {PostBlockResource} from "@/types/api";
import BlockRenderer from "@/pages/public/molecules/article/blocks/BlockRenderer.vue";
import List from "@/pages/public/atoms/lists/List.vue";

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
