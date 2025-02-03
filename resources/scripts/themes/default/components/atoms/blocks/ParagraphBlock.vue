<script setup lang="ts">

import {ParagraphStyleType} from "@kernel/enums/blocks";
import Text from "../typography/Text.vue";

interface Props {
    blockContent: string
    blockStyles: ParagraphBlockStyles
}

interface ParagraphBlockStyles {
    type: ParagraphStyleType;
}

// define
defineProps<Props>()

</script>

<template>
    <Text size="text-lg" class="mb-2" v-html="blockContent" />
</template>
