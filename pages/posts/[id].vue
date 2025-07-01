<script setup lang="ts">
import {useRoute} from "#imports";

const idToBlogMap = new Map();
idToBlogMap.set(13, "13-will-ai-take-over-my-job-in-the-future");
idToBlogMap.set(12, "12-entering-it-(part-3)-navigating-the-software-engineer-interview-process");
idToBlogMap.set(11, "11-unusual-yet-effective-optimizations");
idToBlogMap.set(10, "10-entering-it-(part-2)-best-learning-resources");
idToBlogMap.set(9, "9-entering-it-(part-1)-it-trends-2024");
idToBlogMap.set(8, "8-bouncing-back-from-burnout");
idToBlogMap.set(7, "7-how-not-to-be-hired-by-a-toxic-company");
idToBlogMap.set(6, "6-the-dark-side-of-it");
idToBlogMap.set(5, "5-how-to-choose-the-right-backend-architecture");
idToBlogMap.set(4, "4-modern-backend-in-2023");
idToBlogMap.set(3, "3-you-will-never-be-fully-secured-with-php");
idToBlogMap.set(2, "2-my-journey-beyond-the-hype-of-microservices");
idToBlogMap.set(1, "1-navigating-domain-driven-design-a-prudent-approach-to-software-development");

const route = useRoute()

const slug = idToBlogMap.get(Number(route.params.id))

await navigateTo(`/blog/${slug}`, { redirectCode: 301 });
</script>
<template></template>
