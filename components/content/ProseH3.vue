<script setup lang="ts">
import Heading from "@/components/atoms/typography/Heading.vue";
</script>

<template>
  <Heading level="3" class="text-xl md:text-2xl" v-bind="$attrs">
    <NuxtLink :href="`#${$attrs?.id}`">
      <slot/>
    </NuxtLink>
  </Heading>
</template>