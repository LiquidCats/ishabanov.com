<script setup lang="ts">
import {ListStyleType} from "@kernel/enums/blocks";
import {PostBlockResource} from "@kernel/types/api";
import BlockRenderer from "../../molecules/article/blocks/BlockRenderer.vue";
import List from "../lists/List.vue";

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
