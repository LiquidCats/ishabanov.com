<script setup lang="ts">

import Heading from "@/components/atoms/typography/Heading.vue";
import Text from "@/components/atoms/typography/Text.vue";
</script>

<template>
  <div class=" p-6 text-zinc-50 rounded-2xl font-medium text-2xl h-72 flex flex-col justify-end gap-1">
    <Heading level="3" class="text-zinc-50">
      <slot name="header"></slot>
    </Heading>
    <Text class="text-zinc-50 text-base">
      <slot name="content"></slot>
    </Text>
  </div>
</template>