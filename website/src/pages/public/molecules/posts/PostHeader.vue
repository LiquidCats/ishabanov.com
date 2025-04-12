<script setup lang="ts">

import Heading from "@/pages/public/atoms/typography/Heading.vue";
import SmallText from "@/pages/public/atoms/typography/SmallText.vue";
import {TextFamily, TextSize, TextWeight} from "@/enums/text";
import dayjs from "dayjs";
import {computed} from "vue";

interface Props {
    publishedAt: string
    readingTime: number
}

//define
const props = defineProps<Props>()
// computed

const humanizedPublishedAt = computed(() => dayjs(props.publishedAt).fromNow())
</script>

<template>
    <header class="mb-3">
        <Heading :level="2"
             :size="TextSize.xl5"
             :family="TextFamily.serif"
             :weight="TextWeight.bold"
             class="text-gray-50 mb-1">
            <slot></slot>
        </Heading>
        <SmallText class="block">{{ humanizedPublishedAt }} | reading time {{ readingTime }} min</SmallText>
    </header>
</template>

<style scoped lang="scss">

</style>
