<script setup lang="ts">
import Heading from "@/components/atoms/typography/Heading.vue";
import SmallText from "@/components/atoms/typography/SmallText.vue";
import Tag from "@/components/atoms/Tag.vue";
import {TextFamily, TextSize, TextWeight} from "@/enums/text";
import type {TagResource} from "@/types/api";
import {computed} from "vue";
import dayjs from "dayjs";

interface Props {
    imageUrl?: string
    tags: Array<TagResource>
    publishedAt: string
    readingTime: number
}

// define
const props = defineProps<Props>()
// compute
const humanDate = computed(() => dayjs(props.publishedAt).fromNow())
</script>

<template>
    <header class="rounded-xl mb-3 overflow-hidden bg-cover bg-no-repeat bg-center flex flex-row "
            :class="{
                'min-h-96': !!imageUrl
            }"
            :style="`background-image: url('${imageUrl}')`">
        <div class="flex flex-col grow justify-end p-6 bg-gradient-to-t from-night from-20% to-transparent">
            <Heading :level="1"
                     :size="TextSize.xl6"
                     :family="TextFamily.serif"
                     :weight="TextWeight.bold"
                     class="mb-3"><slot/></Heading>
            <SmallText class="block mb-3">{{ humanDate }} | reading time {{ readingTime }} min</SmallText>
            <div class="flex flex-wrap gap-1">
                <Tag v-for="tag in tags">{{ tag.name }}</Tag>
            </div>
        </div>
    </header>
</template>
