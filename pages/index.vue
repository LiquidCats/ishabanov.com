<script setup lang="ts">

import Experience from "~/components/organisms/Experience.vue";
import Hero from "~/components/organisms/Hero.vue";

useHead({
  titleTemplate: (titleChunk) => `${titleChunk} - Home`,
})

</script>

<template>
  <Hero class="mb-3" />
  <Experience />
</template>

<style scoped lang="scss">

</style>