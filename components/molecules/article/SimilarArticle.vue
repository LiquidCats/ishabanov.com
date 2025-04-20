<script setup lang="ts">
import SmallText from "~/components/atoms/typography/SmallText.vue";
import Text from "~/components/atoms/typography/Text.vue";
import AppLink from "~/components/atoms/AppLink.vue";
import {computed} from "vue";
import dayjs from "dayjs";
import {AppRoutes} from "~/enums/routes";
import Heading from "~/components/atoms/typography/Heading.vue";
import {TextSize} from "~/enums/text";

interface Props {
    postId: number
    publishedAt: string
    title: string
    description: string
}

// define
const props = defineProps<Props>()
defineEmits(['click:post-nav'])

// compute
const humanDate = computed(() => dayjs(props.publishedAt).fromNow())
</script>

<template>
    <article class="bg-night rounded-xl p-3 relative">
        <AppLink :to="`/posts/${postId}`" @click="$emit('click:post-nav', postId)" class="absolute -inset-1"></AppLink>
        <Heading :level="3" :size="TextSize.xl" class="mb-0 line-clamp-1">
            {{ title }}
        </Heading>
        <SmallText class="block mb-3">{{ humanDate }}</SmallText>
        <Text as="div" class="line-clamp-3" v-html="description"/>
    </article>
</template>
