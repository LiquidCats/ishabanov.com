<script setup lang="ts">
interface Props {
    years: number
}

// Define
defineProps<Props>()

</script>

<template>
    <div class="p-5 bg-blue-800 flex flex-col justify-end items-center rounded-xl text-white">
        <span class="text-9xl font-bold">{{ years }}</span>
        <span class="text-xl font-bold">years</span>
        <span class="text-xl font-bold -mt-1">in IT</span>
    </div>
</template>
