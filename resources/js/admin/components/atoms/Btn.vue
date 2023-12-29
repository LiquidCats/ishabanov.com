<script setup lang="ts">
    import type {Colors} from "../../types/colors";
    interface Props {
        type: Colors,
        icon?: string,
    }

    defineProps<Props>()
</script>

<template>
    <button type="button" :class="'btn btn-' + type">
        <i v-if="icon" :class="'bi bi-' + icon"></i> <slot></slot>
    </button>
</template>

<style scoped lang="scss">

</style>
