<script setup lang="ts">
import Heading from "../typography/Heading.vue";
import {computed} from "vue";

interface Props {
    tag: 'h1'|'h2'|'h3'|'h4'|'h5'|'h6'
    blockClasses: string
    blockContent: string
}

//define
const props = defineProps<Props>()

// compute
const level = computed(() => Number(props.tag.slice(1)) as 1 | 2 | 3 | 4 | 5 | 6)
</script>

<template>
    <Heading :level="level"
             :class="blockClasses"
             v-memo="[blockContent, blockClasses, level]"
             v-html="blockContent" />
</template>
