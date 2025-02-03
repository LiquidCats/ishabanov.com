<script setup lang="ts">
interface Props {
    title: string
    description: string
    publishedAt: string
    imageUrl?: string
}
const location = window.location

defineProps<Props>()
</script>

<template>
    <Teleport to="head">
        <meta v-if="description" name="description" :content="description">
        <meta property="og:site_name" content="Ilia Shabanov - Software Engineer">
        <meta property="og:type" content="article">
        <meta v-if="title" property="og:title" :content="title">
        <meta v-if="description" property="og:description" :content="description">
        <meta property="og:url" :content="location?.href">
        <meta v-if="imageUrl" property="og:image" :content="imageUrl" />
        <meta v-if="publishedAt" property="article:published_time" :content="publishedAt" />
    </Teleport>
</template>
