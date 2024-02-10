<script setup lang="ts">

import {Colors} from "../../types/colors";
import formatBytes from "../../utils/fromBytes";
import {FileToUpload} from "../../types/internals";
import Btn from "../../components/atoms/Btn.vue";

interface Props {
    file: FileToUpload
    isUploading: boolean
}

defineProps<Props>()

</script>

<template>
    <div class="files__upload-preview d-flex gap-2 border border-1 border-light-subtle rounded-3 p-3 mb-2">
        <div class="files__upload-preview__image img-thumbnail"
             :style="`background-image: url(${file.preview})`">
        </div>
        <div class="col">
            <div class="d-flex gap-2">
                <div class="mb-2 form-floating w-100">
                    <input type="text"
                           class="form-control form-control-sm"
                           :id="file.name"
                           :value="file.name"
                           @input="file.name = $event.target?.value?.trim()"
                           placeholder="search" >
                    <label :for="file.name">Name</label>
                </div>
                <div class="d-flex gap-2">
                    <div><Btn :type="Colors.primary"
                              icon="upload"
                              class="btn-sm"
                              :class="{'disabled': isUploading}"
                              :disabled="isUploading"
                              @click="$emit('file:upload', file)"/></div>
                    <div><Btn :type="Colors.danger"
                              icon="trash"
                              class="btn-sm"
                              :class="{'disabled': isUploading}"
                              :disabled="isUploading"
                              @click="$emit('file:remove', file)"/></div>
                </div>

            </div>
            <div>
                <div class="mb-0 small text-muted">type: {{ file.file.type }}</div>
                <div class="mb-0 small text-muted">ext.: {{ file.extension }}</div>
                <div class="mb-0 small text-muted">size: {{ formatBytes(file.file.size) }}</div>
            </div>
        </div>
    </div>
</template>

<style scoped lang="scss">
.files__upload-preview {
    &__image {
        width: 100px;
        height: 100px;
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
    }
}
</style>
