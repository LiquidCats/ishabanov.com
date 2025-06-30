<script setup lang="ts">
import { cn } from "@/lib/utils";
import type { HTMLAttributes } from "vue";

interface Props {
  level?: "1" | "2" | "3" | "4" | "5" | "6";
  class?: HTMLAttributes["class"];
}

const props = withDefaults(defineProps<Props>(), {
  level: "1",
});

const classes = ["text-zinc-800", "dark:text-zinc-50"];
</script>

<template>
  <component :is="`h${level}`" :class="cn(classes, props?.class)">
    <slot />
  </component>
</template>
