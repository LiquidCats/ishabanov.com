<script lang="ts">
import type { BlogPostMetadata } from "@/types/content";

export const post = {
  legacyId: 11,
  date: "2024-01-28",
  title: "Unusual Yet Effective Optimizations",
  description:
    "Today, let's talk about some quirky yet effective optimization strategies. A few weeks ago, I was working on improving the performance of a service. Originally, its task was to verify certain details on a cryptocurrency blockchain, then check and either insert or update data in a database (DB). It sounded like a solid plan, and our initial tests seemed promising.",
  tags: [
    "optimization",
    "performance-optimization",
    "database-management",
    "efficient-coding",
    "data-scaling",
    "tech-solutions",
  ],
  image: "/images/media/FdydtsC987o9YcapdcWRjx9htTzl8lLN9ahroDJS.jpg",
  readingTime: "2 min",
} satisfies BlogPostMetadata;
</script>

<script setup lang="ts">
import BlogArticle from "@/components/organisms/BlogArticle.vue";
</script>

<template>
  <BlogArticle :post="post">
    <p>Today, let's talk about some quirky yet effective optimization strategies. A few weeks ago, I was working on improving the performance of a service. Originally, its task was to verify certain details on a cryptocurrency blockchain, then check and either insert or update data in a database (DB). It sounded like a solid plan, and our initial tests seemed promising.</p>
    <p>However, when we started processing real data, issues cropped up due to overwhelming the database. A quick investigation revealed that the volume of actual data far exceeded our development estimates. You might wonder, what exactly went wrong? Well, our tests were conducted on a much smaller scale than needed. Consequently, in a production environment, the service had to check a DB table containing tens of millions of rows, while simultaneously performing insertions and updates on another table.</p>
    <p>So, how did we optimize it? First off, we implemented <strong>preloading</strong>: instead of checking in the DB, we shifted this process to memory. Sometimes, addressing problems this way is perfectly fine. Yes, it used about 3 GB of RAM at its peak, but utilizing RAM as temporary storage is quite acceptable—just remember that tools like Redis are also available. Next, we optimized the insertion and update processes. Rather than updating and inserting one record at a time, we switched to <strong>bulk operations</strong>. To give you an idea of the improvement, processing 3,000 entries individually took around 12 seconds, but when combined into a single bulk operation, it only took about 0.085 seconds—that’s less than 100 milliseconds! After implementing these optimizations, the service operated almost 20× faster.</p>
    <p>In conclusion, always remember to consider the actual data volume when developing a new service. And equally important, don’t skip performance testing before going live with your services. It’s crucial for avoiding surprises down the road.</p>
  </BlogArticle>
</template>
