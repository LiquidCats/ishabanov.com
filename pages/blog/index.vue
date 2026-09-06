<script setup lang="ts">
import type { BlogPost, BlogPostMetadata } from "@/types/content";
import { ChevronLeft } from "lucide-vue-next";
import Heading from "@/components/atoms/typography/Heading.vue";
import PostCard from "@/components/molecules/PostCard.vue";

const router = useRouter();
useSeoMeta({
  titleTemplate: (titleChunk) => titleChunk + " - Blog",
  ogTitle: "Blog",
  ogDescription: "Ilya Shabanov's Blog",
});

const modules = import.meta.glob<BlogPostMetadata>(["./*.vue", "!./index.vue"], {
  eager: true,
  import: "post",
});

const posts: BlogPost[] = Object.entries(modules)
  .map(([path, post]) => ({ ...post, slug: path.slice(2, -4) }))
  .sort((a, b) => b.date.localeCompare(a.date));

const postChunks: BlogPost[][] = [];
for (let i = 0; i < posts.length; i += 4) {
  postChunks.push(posts.slice(i, i + 4));
}

</script>

<template>
  <div class="lg:max-w-3/4 xl:max-w-2/3 mx-auto space-y-3 mt-6">
    <div>
      <Button as-child>
        <NuxtLink href="/"><ChevronLeft class="size-5" />Back</NuxtLink>
      </Button>
    </div>
    <Heading level="1" class="text-4xl md:text-6xl font-black"> Blog </Heading>
    <hr class="mb-3" />
    <div class="space-y-3">
      <div
        v-for="(chunk, index) in postChunks"
        :key="index"
        :class="{
          'grod-cols-1 lg:grid-rows-1 lg:grid-cols-1': chunk.length === 1,
          'grod-cols-1 lg:grid-rows-1 lg:grid-cols-2': chunk.length === 2,
          'grod-cols-1 lg:grid-rows-2 lg:grid-cols-2': chunk.length === 3,
          'grod-cols-1 lg:grid-rows-2 lg:grid-cols-5': chunk.length === 4,
        }"
        class="grid gap-3"
      >
        <PostCard
          v-for="(post, index) in chunk"
          :item="post"
          :class="{
            'col-span-3': (index === 0 || index === 3) && chunk.length === 4,
            'col-span-2': (index === 1 || index === 2) && chunk.length === 4,
          }"
          :key="post.slug"
        />
      </div>
    </div>
  </div>
</template>
