<script setup lang="ts">
import {RouterLink} from 'vue-router'

interface Props {
    to: any
}

defineProps<Props>()

</script>

<template>
    <RouterLink activeClass="bg-gray-400/[.1]" :to="to" class="flex gap-3 justify-start items-center rounded-md duration-300 dark:text-gray-50 hover:bg-gray-400/[.2]">
        <slot></slot>
    </RouterLink>
</template>

<style scoped lang="scss">

</style>
