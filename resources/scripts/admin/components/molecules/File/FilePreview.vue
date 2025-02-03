<script setup lang="ts">
import {TrashIcon, ArrowUpOnSquareIcon} from "@heroicons/vue/24/outline"
import {Colors} from "../../../domain/types/colors";
import formatBytes from "../../../utils/fromBytes";
import {FileToUpload} from "../../../domain/types/internals";
import Btn from "../../atoms/Btn.vue";
import Tag from "../../atoms/Tag.vue";
import FormField from "../../atoms/Form/FormField.vue";
import FormLabel from "../../atoms/Form/FormLabel.vue";
import {hashCode} from "../../../utils/hashCode";

interface Props {
    file: FileToUpload
    isUploading: boolean
}

defineProps<Props>()

</script>

<template>
    <div class="border dark:border-stone-700 border-stone-300 dark:bg-zinc-800 p-3 rounded">
        <div class="size-64 bg-center bg-cover bg-no-repeat mb-3 w-full rounded"
             :style="`background-image: url('${file.preview}')`"/>
        <div>
            <div class="flex gap-2 mb-2 text-white text-lg">
                <Tag :type="Colors.primary">{{ file.extension }}</Tag>
            </div>
            <div class="text-white text-2xl mb-2"> {{ formatBytes(file.file.size) }} </div>
            <div class="mb-3">
                <FormLabel class="text-sm" :for="`v-file-${hashCode(file.name)}`">Name</FormLabel>
                <FormField :id="`v-file-${hashCode(file.name)}`" v-model="file.name" />
            </div>
            <div class="flex gap-2 justify-end">
                <Btn :type="Colors.primary"
                     :disabled="isUploading"
                     class="text-sm grow"
                     @click="$emit('file:upload', file)">
                    <ArrowUpOnSquareIcon class="size-4"/> Upload
                </Btn>
                <Btn :type="Colors.danger"
                     :disabled="isUploading"
                     class="text-sm grow"
                     @click="$emit('file:remove', file)">
                    <TrashIcon class="size-4"/> Remove
                </Btn>
            </div>
        </div>
    </div>
</template>

<style scoped lang="scss">

</style>
