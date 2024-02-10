<script setup lang="ts">
    import type {Colors} from "../../types/colors";

    interface Props {
        type: Colors
    }

    defineProps<Props>()
</script>

<template>
    <span :class="'badge text-bg-' + type"><slot></slot></span>
</template>

<style scoped lang="scss">

</style>
