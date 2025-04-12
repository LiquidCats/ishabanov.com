<script setup lang="ts">
import ListItem from "../lists/ListItem.vue";

interface Props {
    blockContent: string
}

//define
defineProps<Props>()
</script>

<template>
    <ListItem v-html="blockContent"
              v-memo="[blockContent]"/>
</template>
