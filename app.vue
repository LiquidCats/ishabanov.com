<template>
  <NuxtLoadingIndicator />
  <NuxtLayout>
    <TooltipProvider>
      <NuxtPage />
    </TooltipProvider>
  </NuxtLayout>
</template>

<script lang="ts">
import dayjs from "dayjs"; // ES 2015
import relativeTime from "dayjs/plugin/relativeTime";
import duration from "dayjs/plugin/duration";
import { defineComponent } from "vue";
import { TooltipProvider } from "@/components/ui/tooltip";

export default defineComponent({
  components: { TooltipProvider },
});

dayjs.extend(relativeTime);
dayjs.extend(duration);
</script>
