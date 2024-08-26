<script setup lang="ts">
import ListItem from "../lists/ListItem.vue";

interface Props {
    blockClasses: string
    blockContent: string
}

//define
defineProps<Props>()
</script>

<template>
    <ListItem :class="blockClasses"
              v-html="blockContent"
              v-memo="[blockClasses, blockContent]"/>
</template>
