<script setup lang="ts">
import { Mouse } from "lucide-vue-next";
import { Motion } from "motion-v";
</script>
<template>
  <Motion
    as="div"
    :class="[
      'absolute bottom-6 left-1/2 -translate-x-1/2',
      'flex flex-row items-center justify-center gap-1',
    ]"
    :animate="{ opacity: 1, y: 0, scale: 1 }"
    :exit="{ opacity: 0, y: 100, scale: 0 }"
    :initial="{ opacity: 0, y: 100, scale: 0 }"
  >
    <div><Mouse class="size-8" /></div>
    <div class="text-sm leading-none">
      <div>scroll</div>
      <div>down</div>
    </div>
  </Motion>
</template>
