<script setup lang="ts">
import {ArrowRightIcon, ArrowLeftIcon} from "lucide-vue-next"
import AppLink from "~/components/atoms/AppLink.vue";
import Heading from "~/components/atoms/typography/Heading.vue";
import {computed} from "vue";

interface Props {
    type: "prev"|"next"
    postId: number
    title: string
}

// define
const props = defineProps<Props>()
const classes = computed(() => ({
    'text-start': props.type === 'prev',
    'text-right': props.type === 'next',
}))

</script>

<template>
    <div class="flex group flex-row gap-6 bg-night duration-300 hover:bg-stone-800 rounded-xl text-gray-400 hover:text-gray-200 items-center relative p-3 cursor-pointer">
        <AppLink :to="`/posts/${postId}`" class="absolute -inset-1 z-10"/>
        <div v-if="type === 'next'"><ArrowLeftIcon class="size-8" /></div>

        <div class="overflow-hidden truncate grow">
            <div class="text-sm text-gray-500" :class="classes" v-text="type === 'prev' ? 'previous' : 'next' "/>
            <Heading :level="5" :class="classes" class="m-0 line-clamp-1 truncate overflow-clip">{{ title }}</Heading>
        </div>

        <div v-if="type === 'prev'"><ArrowRightIcon class="size-8" /></div>
    </div>
</template>
