<script setup lang="ts">
import { stagger, animate } from "motion-v";
import SectionHeading from "@/components/molecules/SectionHeading.vue";
import ServicesCard from "@/components/molecules/ServicesCard.vue";

const services = [
  {
    classes: ["bg-gradient-to-r", "from-cyan-500", "to-blue-500"],
    header: "System Design",
    content:
      "Get expert system design: scalable architecture, microservices, databases, APIs, high availability, fault tolerance, and cost-efficient solutions.",
  },
  {
    classes: ["bg-gradient-to-r", "from-violet-600", "to-indigo-600"],
    header: "Backend Architecture",
    content:
      "Expert in backend architecture: microservices, REST/gRPC APIs, Go/Node.js, Redis, PostgreSQL, scaling, security, and CI/CD best practices.",
  },
  {
    classes: [
      "md:col-span-2",
      "lg:col-span-1",
      "bg-gradient-to-r",
      "from-red-500",
      "to-orange-500",
    ],
    header: "Consulting",
    content:
      "Expert help with Vue, Nuxt, Go, APIs, frontend/backend architecture, animations, performance, code reviews, testing & profitable pet projects.",
  },
];

const cardsContainerRef = useTemplateRef("cards-container");
const isInView = useInView(cardsContainerRef, { amount: 0.1 });
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
  if (!cardsContainerRef.value) return;

  const elems = cardsContainerRef.value.querySelectorAll(":scope > div");
  const options = inView ? appearOptions : disappearOptions;
  animate(elems, options, {
    delay: stagger(0.15),
    type: "spring",
    bounce: 0.2,
    duration: 0.7,
  });
});
</script>

<template>
  <section class="max-w-6xl mx-auto space-y-3 mb-10" id="services">
    <SectionHeading>Services</SectionHeading>
    <div
      ref="cards-container"
      class="grid lg:grid-rows-1 lg:grid-cols-3 md:grid-rows-2 md:grid-cols-2 grid-cols-1 grid-rows-3 gap-3"
    >
      <ServicesCard v-for="item in services" :class="item.classes">
        <template #header>{{ item.header }}</template>
        <template #content>{{ item.content }}</template>
      </ServicesCard>
    </div>
  </section>
</template>
