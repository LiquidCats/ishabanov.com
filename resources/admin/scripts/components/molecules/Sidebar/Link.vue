<script setup lang="ts">
</script>

<template>
    <a v-bind="$attrs" href="/" class="flex gap-3 justify-start items-center rounded-md duration-300 dark:text-gray-50 hover:bg-sky-400/[.1]" target="_blank">
        <slot></slot>
    </a>
</template>
