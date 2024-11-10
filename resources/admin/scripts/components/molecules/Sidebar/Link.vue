<script setup lang="ts">

import {ArrowUturnLeftIcon} from "@heroicons/vue/20/solid";

interface Props {
    to: string,
}
</script>

<template>
    <a href="/" class="flex gap-3 justify-start items-center py-1.5 md:px-3 rounded-md duration-300 dark:text-gray-50 hover:bg-sky-400/[.1]" target="_blank">
        <slot></slot>
    </a>
</template>

<style scoped lang="scss">

</style>
