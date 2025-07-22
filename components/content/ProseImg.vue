<script setup lang="ts">
defineProps({
  url: {
    type: String,
    required: false,
  },
})
</script>

<template>
  <NuxtImg v-bind="$attrs"
       class="rounded-xl mx-auto"
       :data-test="`~/assets/${$attrs?.src}`"/>
</template>
