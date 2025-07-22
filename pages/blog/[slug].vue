<script setup lang="ts">
import dayjs from "dayjs"; // ES 2015
import { ChevronLeft } from "lucide-vue-next";
import { Button } from "@/components/ui/button";
import ProseH1 from "@/components/content/ProseH1.vue";
import ProseImg from "@/components/content/ProseImg.vue";
import Tag from "@/components/atoms/Tag.vue";
import { Card, CardHeader, CardContent } from "@/components/ui/card";

const slug = useRoute().params.slug;

const { data: post } = await useAsyncData(`blog-${slug}`, () => {
  return queryCollection("blog").path(`/blog/${slug}`).first();
});

useSeoMeta({
  titleTemplate: (titleChunk) => titleChunk + " - Blog - " + post.value?.title,
  ogTitle: post.value?.title,
  ogDescription: post.value?.description,
});
</script>

<template>
  <section class="lg:max-w-2/3 mx-auto space-y-3 mt-6">
    <div>
      <Button as-child>
        <NuxtLink href="/blog"> <ChevronLeft class="size-5" />Back</NuxtLink>
      </Button>
    </div>

    <Card v-if="post" class="bg-zinc-50">
      <CardHeader class="space-y-3">
        <small class="text-sm text-gray-500">
          published at: {{ dayjs().to(post.date) }}
        </small>
        <ProseH1>{{ post.title }}</ProseH1>
        <div class="flex flex-wrap gap-1">
          <Tag v-for="tag in post.meta?.tags as string[]">{{ tag }}</Tag>
        </div>
        <ProseImg
          v-if="post.meta?.image"
          :src="post.meta?.image as string"
          :alt="post.title"
          :url="post.meta?.image as string"
        />
      </CardHeader>
      <CardContent>
        <ContentRenderer tag="article" :value="post" class="space-y-3" />
      </CardContent>
    </Card>
  </section>
</template>

<style></style>
