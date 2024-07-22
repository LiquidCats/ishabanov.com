<script setup lang="ts">

import {computed} from "vue";
import {TrashIcon} from "@heroicons/vue/20/solid"

import Tag from "../../atoms/Tag.vue";
import Btn from "../../atoms/Btn.vue";
import formatBytes from "../../../utils/fromBytes";

import type {File} from "../../../types/data";
import {Colors} from "../../../types/colors";

interface Props {
    file: File
    isDeleting: boolean
}

const props = defineProps<Props>()

const fileSizeInBytes = computed(() => formatBytes(props.file.file_size))

</script>

<template>
    <div class="border bg-neutral-100 dark:bg-zinc-700 dark:border-stone-700 border-stone-300 rounded-md p-3">
        <div class="size-64 bg-center bg-cover bg-no-repeat mb-3 w-full rounded"
             :style="{backgroundImage: file.path}"/>
        <div>
            <div class="flex gap-2 mb-2 dark:text-gray-50 text-lg">
                <Tag :type="Colors.primary">{{ file.extension }}</Tag>
                <Tag :type="Colors.dark" class="truncate">ID: {{ file.hash }}</Tag>
            </div>
            <div class="dark:text-gray-50 text-2xl mb-2"> {{ fileSizeInBytes }} </div>
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
