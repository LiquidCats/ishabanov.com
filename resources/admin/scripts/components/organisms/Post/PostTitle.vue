<script setup lang="ts">

import PageHeader from "../../molecules/PageHeader.vue";
import Tag from "../../atoms/Tag.vue";
import PostPreview from "../../molecules/Post/PostPreview.vue";
import {PreviewTypes} from "../../../types/data";

interface Props {
    title: string
    postId: number
    hasPreview: boolean
    previewPath: null|string
    previewType: null|PreviewTypes
}

defineEmits(['click:preview-image', 'click:preview-type', 'click:preview-remove'])
defineProps<Props>()

</script>

<template>
    <div class="flex flex-row justify-start gap-2 mb-3">
        <PostPreview :preview-path="previewPath"
                     :preview-type="previewType"
                     :has-preview="hasPreview"
                     @click:image="$emit('click:preview-image')"
                     @click:preview-type="$emit('click:preview-type', $event)"
                     @click:remove="$emit('click:preview-remove')"
                     class="flex-none"/>
        <div class="flew flex-col gap-1">
            <div>
                <Tag class="text-nowrap" type="dark">
                    {{ postId > 0 ? `ID: ${ postId }` : 'Post:' }}
                </Tag>
            </div>
            <div>
                <PageHeader class="!mb-0">{{ title }}</PageHeader>
            </div>
        </div>
    </div>
</template>

<style scoped lang="scss">

</style>
