<script setup lang="ts">

import {Colors} from "../../types/colors";

interface Props {
    type?: Colors
    message: string
}

defineProps<Props>()

</script>

<template>
    <div class="alert d-flex shadow overflow-hidden" :class="`alert-${type || Colors.light}`" role="alert">
        <span class="col text-wrap text-break">{{ message }}</span>
        <button type="button" class="btn-sm btn-close" aria-label="Close" @click="$emit('close')"></button>
    </div>
</template>

<style scoped>

</style>
