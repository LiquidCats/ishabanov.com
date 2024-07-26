<script setup lang="ts">
interface Props {
    to?: string
}
// define
defineProps<Props>()
</script>

<template>
    <a :href="to" class="text-gray-50 no-underline"><slot/></a>
</template>
