<script setup lang="ts">
import SmallText from "../../atoms/typography/SmallText.vue";
import Text from "../../atoms/typography/Text.vue";
import AppLink from "../../atoms/AppLink.vue";
import {computed} from "vue";
import dayjs from "dayjs";
import {RouteNames} from "../../../domain/enums/routes";
import Heading from "../../atoms/typography/Heading.vue";
import {TextSize} from "../../../domain/enums/text";

interface Props {
    postId: number
    publishedAt: string
    title: string
    description: string
}

// define
const props = defineProps<Props>()

// compute
const humanDate = computed(() => dayjs(props.publishedAt).fromNow())
</script>

<template>
    <article class="bg-night rounded-xl p-3 relative">
        <AppLink :to="{name: RouteNames.POST_ARTICLE, params: {postId}}" class="absolute -inset-1"></AppLink>
        <Heading :level="3" :size="TextSize.xl" class="mb-0 line-clamp-1">
            {{ title }}
        </Heading>
        <SmallText class="block mb-3">{{ humanDate }}</SmallText>
        <Text as="div" class="line-clamp-3" v-html="description"/>
    </article>
</template>
