<script setup lang="ts">

import PageHeader from "../molecules/PageHeader.vue";
import Tag from "../atoms/Tag.vue";
import {Colors} from "../../domain/types/colors";
</script>

<template>
    <PageHeader class="mt-3">Dashboard</PageHeader>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
        <div class="p-3 bg-neutral-100 dark:bg-zinc-800 rounded-md">
            <Tag :type="Colors.primary">id: 1</Tag>
            <div class="text-2xl font-bold dark:text-gray-50">Ilya Shabanov</div>
            <div class="text-sm text-neutral-400">role: admin</div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <div>
                    <div class="text-2xl dark:text-gray-50 -mb-2">Posts</div>
                    <div class="text-6xl font-bold dark:text-gray-50">7</div>
                </div>
                <div>
                    <div class="text-neutral-400 dark:text-zinc-500 text-xs">pending</div>
                    <div class="font-bold text-neutral-400 dark:text-zinc-500 text-2xl">3</div>
                    <div class="text-neutral-400 dark:text-zinc-500 text-xs">hidden</div>
                    <div class="font-bold text-neutral-400 dark:text-zinc-500 text-2xl">7</div>
                </div>
            </div>

        </div>
        <div class="grid grid-cols-2 gap-3">
            <div class="p-3 bg-neutral-100 dark:bg-zinc-800 rounded-md">
                <div class="text-xl dark:text-gray-50">Files</div>
                <div class="font-bold text-4xl dark:text-gray-50">43</div>
            </div>
            <div class="p-3 bg-neutral-100 dark:bg-zinc-800 rounded-md">
                <div class="text-xl dark:text-gray-50">Tags</div>
                <div class="font-bold text-4xl dark:text-gray-50">10</div>
            </div>
            <div class=" col-span-2 p-3 bg-neutral-100 dark:bg-zinc-800 rounded-md">
                <div class="text-xl dark:text-gray-50">Posts</div>
                <div class="font-bold text-4xl dark:text-gray-50">20</div>
                <div class="text-sm text-neutral-400 dark:text-zinc-500">3 pending</div>
                <div class="text-sm text-neutral-400 dark:text-zinc-500">1 hidden</div>
            </div>
        </div>

        <div class="p-3 col-span-1 sm:col-span-2 md:col-span-1 bg-neutral-100 dark:bg-zinc-800 rounded-md">asda</div>

    </div>
</template>
