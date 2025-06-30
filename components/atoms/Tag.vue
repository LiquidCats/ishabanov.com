<script setup lang="ts">
import { Hash } from "lucide-vue-next";
import { Badge } from "@/components/ui/badge";
</script>

<template>
  <Badge variant="secondary"><Hash class="size-4" /><slot /> </Badge>
</template>
