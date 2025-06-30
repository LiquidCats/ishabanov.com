<script setup lang="ts">
import Heading from "@/components/atoms/typography/Heading.vue";
</script>

<template>
  <Heading level="4" class="text-lg md:text-xl" v-bind="$attrs">
    <NuxtLink :href="`#${$attrs?.id}`">
      <slot/>
    </NuxtLink>
  </Heading>
</template>