<script setup lang="ts">
import {RouterLink} from 'vue-router'

interface Props {
    to: any
}

defineProps<Props>()

</script>

<template>
    <RouterLink :to="to" class="flex gap-3 justify-start items-center py-1.5 md:px-3 rounded-md duration-300 dark:text-gray-50 hover:bg-gray-400/[.1]">
        <slot></slot>
    </RouterLink>
</template>

<style scoped lang="scss">

</style>
