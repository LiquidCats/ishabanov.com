<script setup lang="ts">
import dayjs from "dayjs";
import { ChevronLeft } from "lucide-vue-next";
import type { BlogPostMetadata } from "@/types/content";
import Heading from "@/components/atoms/typography/Heading.vue";
import Tag from "@/components/atoms/Tag.vue";
import { Button } from "@/components/ui/button";
import { Card, CardContent, CardHeader } from "@/components/ui/card";

const props = defineProps<{ post: BlogPostMetadata }>();

useSeoMeta({
  title: () => `${props.post.title} - Blog`,
  ogTitle: () => props.post.title,
  ogDescription: () => props.post.description,
});
</script>

<template>
  <section class="lg:max-w-2/3 mx-auto space-y-3 mt-6">
    <div>
      <Button as-child>
        <NuxtLink href="/blog"><ChevronLeft class="size-5" />Back</NuxtLink>
      </Button>
    </div>

    <Card class="bg-zinc-50">
      <CardHeader class="space-y-3">
        <small class="text-sm text-gray-500">
          published at: {{ dayjs().to(post.date) }}
        </small>
        <Heading level="1" class="text-4xl md:text-6xl font-black">
          {{ post.title }}
        </Heading>
        <div class="flex flex-wrap gap-1">
          <Tag v-for="tag in post.tags" :key="tag">{{ tag }}</Tag>
        </div>
        <NuxtImg
          v-if="post.image"
          :src="post.image"
          :alt="post.title"
          class="rounded-xl mx-auto"
        />
      </CardHeader>
      <CardContent>
        <article class="blog-prose"><slot /></article>
      </CardContent>
    </Card>
  </section>
</template>
