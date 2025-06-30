<script setup lang="ts">
import dayjs from "dayjs";
import type { ExperienceCollectionItem } from "@nuxt/content";
import { Card, CardHeader, CardTitle, CardContent } from "@/components/ui/card";
import { useInView, animate, stagger } from "motion-v";
import { useTemplateRef, watch } from "vue";

interface Props {
  item: ExperienceCollectionItem;
  placement?: "odd" | "even";
}

const cardContainerRef = useTemplateRef<HTMLLIElement>("card");
const isInView = useInView(cardContainerRef, { amount: 0.3 });
const appearOptions = {
  opacity: [0, 1],
  y: [50, 0],
  scale: [0.9, 1],
};
const disappearOptions = {
  opacity: [1, 0],
  y: [0, 50],
  scale: [1, 0.9],
};

watch(isInView, (inView) => {
  if (!cardContainerRef.value) return;

  const timelineDot = cardContainerRef.value?.querySelector(":scope > span");
  const cardContainer = cardContainerRef.value?.querySelector(":scope > div");

  if (timelineDot && cardContainer) {
    const options = inView ? appearOptions : disappearOptions;
    animate([timelineDot, cardContainer], options, {
      delay: stagger(0.15),
      type: "spring",
      bounce: 0.2,
      duration: 0.7,
    });
  }
});
// Props
defineProps<Props>();
</script>

<template>
  <li
    ref="card"
    class="flex relative"
    :class="{
      'md:justify-end': placement === 'even',
      'md:justify-sart': placement === 'odd',
    }"
  >
    <!-- Timeline Dot -->
    <span
      class="absolute -left-1.5 md:left-1/2 md:-translate-x-1/2 z-1 -translate-y-1/2 px-3 py-1 flex items-center justify-center rounded-full bg-zinc-900 text-zinc-50 ring-2 ring-zinc-50 shadow-2xl opacity-0"
      >{{ dayjs(item.date).format("MMMM YYYY") }}</span
    >

    <!-- Card Container -->
    <div
      class="md:max-w-1/2 opacity-0"
      :class="{
        'md:pr-3': placement === 'odd',
        'md:pl-3': placement === 'even',
      }"
    >
      <Card class="shadow-xl">
        <CardHeader>
          <CardTitle class="text-2xl">{{ item.title }}</CardTitle>
        </CardHeader>
        <CardContent class="flex flex-col gap-3">
          <NuxtImg
            :src="item.meta.image + '.jpg'"
            :alt="item.title + ' screenshot'"
            class="rounded-lg object-cover w-full h-48 shadow-md"
          />
          <ContentRenderer :value="item"></ContentRenderer>
        </CardContent>
      </Card>
    </div>
  </li>
</template>

<style scoped>
li > span,
li > div {
  will-change: opacity, transform;
}
</style>
