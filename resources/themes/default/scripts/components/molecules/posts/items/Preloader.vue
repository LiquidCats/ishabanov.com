<script setup lang="ts">

</script>

<template>
    <article class="rounded-md bg-night p-6">
        <div class="grid grid-cols-1 animate-pulse">
            <header class="mb-3">
                <div class="w-8/12 h-12 bg-gray-500 rounded mb-1"></div>
                <div class="w-1/3 h-2 bg-gray-500 rounded"></div>
            </header>
            <div aria-label="tags" class="mb-3 flex flex-wrap gap-1 animate-pulse">
                <span class="w-1/12 mb-1 h-6 bg-gray-500 rounded"></span>
                <span class="w-2/12 mb-1 h-6 bg-gray-500 rounded"></span>
                <span class="w-1/12 h-6 bg-gray-500 rounded"></span>
            </div>
            <div class="mb-3 text-gray-50">
                <div class="w-full mb-1 h-5 bg-gray-500 rounded"></div>
                <div class="w-full mb-1 h-5 bg-gray-500 rounded"></div>
                <div class="w-3/4 mb-1 h-5 bg-gray-500 rounded"></div>
                <div class="w-full mb-1 h-5 bg-gray-500 rounded"></div>
                <div class="w-2/3 h-6 bg-gray-500 rounded"></div>
            </div>
            <footer class="text-center">
                <div class="bg-gray-200 inline-flex flex-row rounded-full gap-2 items-center justify-center px-6 py-2">
                    <div class="bg-stone-400 rounded-full size-2"></div>
                    <div class="bg-stone-400 rounded-full size-2"></div>
                    <div class="bg-stone-400 rounded-full size-2"></div>
                </div>
            </footer>
        </div>
    </article>
</template>
