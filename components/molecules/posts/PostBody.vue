<script setup lang="ts">

import Text from "~/components/atoms/typography/Text.vue";
import Tag from "~/components/atoms/Tag.vue";
import type {TagResource} from "~/types/api";

interface Props {
    tags: Array<TagResource>;
}

// define
defineProps<Props>()

</script>

<template>
    <div aria-label="tags" class="mb-3 flex flex-wrap gap-1">
        <Tag v-for="tag in tags">{{ tag.name }}</Tag>
    </div>
    <Text class="mb-3 text-gray-50">
        <slot></slot>
    </Text>
</template>

<style scoped lang="scss">

</style>
