<script setup lang="ts">
import Image from "~/components/atoms/illustration/Image.vue";

interface Props {
    blockContent: {
        caption?: string
        src: string
        alt: string
    }
}

// define
defineProps<Props>()

</script>

<template>
    <figure class="my-2">
        <Image :src="blockContent.src" :alt="blockContent.alt" class="rounded-md mx-auto w-full h-auto" />
        <figcaption v-if="blockContent.caption"
                    class="text-gray-500 max-w-screen-lg text-center mx-auto mt-2leading-tight"
                    v-html="blockContent.caption" />
    </figure>
</template>
