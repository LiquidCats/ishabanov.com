<script setup lang="ts">
import ListItem from "~/components/atoms/lists/ListItem.vue";

interface Props {
    blockContent: string
}

//define
defineProps<Props>()
</script>

<template>
  <client-only>
    <ListItem v-html="blockContent"
              :key="$props?.blockContent"
              v-if="blockContent"
              v-memo="[blockContent]"/>
  </client-only>
</template>
