<script setup lang="ts">
    import type {Colors} from "../../types/colors";

    interface Props {
        type: Colors,
        icon?: string,
        to: string,
    }

    defineProps<Props>()
</script>

<template>
    <router-link type="button" :to="to" :class="'btn btn-' + type">
        <i v-if="icon" :class="'bi bi-' + icon"></i> <slot></slot>
    </router-link>
</template>

<style scoped>

</style>
