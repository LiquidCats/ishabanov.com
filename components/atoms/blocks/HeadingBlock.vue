<script setup lang="ts">
import {computed} from "vue";

import {HeadingStyleType} from "~/enums/blocks";
import Heading from "~/components/atoms/typography/Heading.vue";

interface Props {
    blockStyles: HeadingBlockStyles
    blockContent: string
}

interface HeadingBlockStyles {
    type: HeadingStyleType
}

//define
const props = defineProps<Props>()

// compute
const level = computed(() => {
    switch (props.blockStyles.type) {
        case HeadingStyleType.primary: return 2;
        case HeadingStyleType.secondary: return 3;
        case HeadingStyleType.unimportant: return 4;
    }
})
</script>

<template>
    <Heading :level="level"
             class="mb-4"
             v-memo="[blockContent, level]"
             v-html="blockContent" />
</template>
