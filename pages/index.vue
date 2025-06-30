<script setup lang="ts">
import Hero from "@/components/organisms/Hero.vue";
import About from "@/components/organisms/About.vue";
import Services from "@/components/organisms/Services.vue";
import Experience from "@/components/organisms/Experience.vue";

useHead({
  titleTemplate: (titleChunk) => `${titleChunk} - Home`,
});
</script>

<template>
  <Hero />
  <About />
  <Services />
  <Experience />
</template>
