<script setup lang="ts">
import { queryCollection, useAsyncData } from "#imports";
import ExperienceCard from "@/components/molecules/ExperienceCard.vue";
import SectionHeading from "@/components/molecules/SectionHeading.vue";

const { data: experience } = await useAsyncData("experience", () => {
  return queryCollection("experience").order("date", "ASC").all();
});
</script>

<template>
  <section class="p-6 -mx-3 bg-zinc-800 mb-10" id="experience">
    <div class="max-w-6xl mx-auto space-y-12">
      <SectionHeading class="text-zinc-50">Experience</SectionHeading>
      <AnimatePresence>
        <ol class="relative grid grid-cols-1 gap-12 mb-10">
          <li
            class="absolute md:left-1/2 md:-translate-x-1/2 left-0 translate-4.5 w-px max-w-px ring-2 bg-zinc-50 p-0.5 -top-5 -bottom-5 rounded-2xl"
          />
          <ExperienceCard
            v-for="(item, index) in experience"
            :item="item"
            :key="item.id"
            :placement="(index + 1) % 2 === 0 ? 'even' : 'odd'"
          />
        </ol>
      </AnimatePresence>
    </div>
  </section>
</template>
