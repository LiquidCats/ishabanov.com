<script setup lang="ts">

import {computed} from "vue";
import {TrashIcon} from "@heroicons/vue/24/outline"

import Tag from "../../atoms/Tag.vue";
import Btn from "../../atoms/Btn.vue";
import formatBytes from "../../../utils/fromBytes";

import type {File} from "../../../domain/types/data";
import {Colors} from "../../../domain/types/colors";
import Paper from "../../atoms/Paper.vue";
import DeleteButton from "../Buttons/DeleteButton.vue";

interface Props {
    file: File
    isDisabled: boolean
}

const props = defineProps<Props>()

const fileSizeInBytes = computed(() => formatBytes(props.file.file_size))

</script>

<template>
    <Paper>
        <div class="size-64 bg-center bg-cover bg-no-repeat mb-3 w-full rounded"
             :style="`background-image: url(${file.path})`"/>
        <div>
            <div class="flex gap-2 mb-2 dark:text-gray-50 text-lg">
                <Tag :type="Colors.primary">{{ file.extension }}</Tag>
                <Tag :type="Colors.dark" class="truncate">ID: {{ file.hash }}</Tag>
            </div>
            <div class="dark:text-gray-50 text-2xl mb-2"> {{ fileSizeInBytes }} </div>
            <div class="dark:text-gray-50 text-wrap mb-2">{{ file.name }}</div>

            <hr class="opacity-30 mb-3">
            <div class="flex justify-end items-center">
                <DeleteButton
                    :disabled="isDisabled"
                    @click="$emit('file:remove', file)"/>
            </div>
        </div>
    </Paper>
</template>
