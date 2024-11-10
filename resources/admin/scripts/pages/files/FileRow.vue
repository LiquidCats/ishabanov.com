<script setup lang="ts">

import type {File} from "../../types/data";

import {TrashIcon} from "@heroicons/vue/20/solid"

import {Colors} from "../../types/colors";
import formatBytes from "../../utils/fromBytes";
import Tag from "../../components/atoms/Tag.vue";
import Btn from "../../components/atoms/Btn.vue";

interface Props {
    file: File
    isDeleting: boolean
}

defineProps<Props>()

</script>

<template>
    <div class="border dark:bg-stone-800 dark:border-stone-700 border-stone-300 rounded-md p-3">
        <div class="size-64 bg-center bg-cover bg-no-repeat mb-3 w-full rounded"
             :style="`background-image: url('${file.path}')`"/>
        <div>
            <div class="flex gap-2 mb-2 dark:text-gray-50 text-lg">
                <Tag :type="Colors.primary">{{ file.extension }}</Tag>
                <Tag :type="Colors.dark" class="truncate">ID: {{ file.hash }}</Tag>
            </div>
            <div class="dark:text-gray-50 text-2xl mb-2"> {{ formatBytes(file.file_size) }} </div>
            <div class="dark:text-gray-50 text-wrap mb-2">{{ file.name }}</div>

            <hr class="opacity-30 mb-3">
            <div class="flex justify-end items-center">
                <Btn :type="Colors.danger"
                     class="flex items-center justify-center"
                     :disabled="isDeleting"
                     @click="$emit('file:remove', file)">
                    <TrashIcon class="size-4"/>
                    Delete
                </Btn>
            </div>
        </div>
    </div>
</template>

<style scoped lang="scss">
.bg-cover {
    background-repeat: no-repeat;
    background-position: center center;

    -webkit-background-size: cover;
    background-size: cover;
}
</style>
