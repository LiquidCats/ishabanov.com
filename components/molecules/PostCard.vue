<script setup lang="ts">
import dayjs from "dayjs";
import type { BlogPost } from "@/types/content";
import Tag from "@/components/atoms/Tag.vue";
import Text from "@/components/atoms/typography/Text.vue";

interface Props {
  item: BlogPost;
}
defineProps<Props>();
</script>

<template>
  <Card
    class="shadow-xl h-full overflow-clip relative group"
    :class="{ 'pt-0': item.image }"
  >
    <NuxtLink class="absolute -inset-px z-1" :to="`/blog/${item.slug}`" />

    <div v-if="item.image" class="w-full h-72 overflow-clip relative">
      <NuxtImg
        class="absolute object-cover w-full h-full z-0 group-hover:scale-110 ease-in-out transition-transform duration-300"
        :src="item.image"
        :alt="item.title"
      />
    </div>

    <CardHeader>
      <small class="text-sm text-zinc-500">{{ dayjs().to(item.date) }}</small>
      <CardTitle class="text-2xl">{{ item.title }}</CardTitle>
      <div class="flex flex-wrap gap-1">
        <Tag v-for="tag in item.tags" :key="tag">{{ tag }}</Tag>
      </div>
    </CardHeader>
    <CardContent class="space-y-3">
      <Text class="line-clamp-5">
        {{ item.description }}
      </Text>
    </CardContent>
  </Card>
</template>
