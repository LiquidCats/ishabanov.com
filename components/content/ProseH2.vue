<script setup lang="ts">

import Heading from "@/components/atoms/typography/Heading.vue";
</script>

<template>
  <Heading level="2" class="text-2xl md:text-4xl" v-bind="$attrs">
    <NuxtLink :href="`#${$attrs?.id}`">
      <slot/>
    </NuxtLink>
  </Heading>
</template>