<script setup lang="ts">

import type {File} from "../../types/data";
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
      <div class="files__upload-preview row border border-1 border-light-subtle rounded-3 mb-2 p-3">
            <div class="col-12 col-md-auto d-flex justify-content-center">
                <div class="img-thumbnail bg-cover mx-auto" style="height: 200px;width: 200px;" :style="`background-image: url(${file.path})`"/>
            </div>
            <div class="col">
                <div class="text-truncate mb-2 fs-6">
                    <Tag :type="Colors.dark" class="">ID</Tag> {{ file.hash }}
                </div>
                <div class="text-wrap mb-2 fs-5">
                    <Tag :type="Colors.light">{{ file.extension }}</Tag> {{ file.name }}
                </div>
                <div class="text-muted mb-2"> {{ formatBytes(file.file_size) }} </div>
                <hr>
                <div class="d-flex justify-content-end align-items-center">
                    <Btn :type="Colors.danger"
                         icon="trash"
                         class="btn-sm"
                         :class="{'disabled': isDeleting}"
                         :disabled="isDeleting"
                         @click="$emit('file:remove', file)">Delete</Btn>
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
