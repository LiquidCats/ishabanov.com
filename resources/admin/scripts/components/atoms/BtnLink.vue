<script setup lang="ts">
    import type {Colors} from "../../types/colors";
    import Btn from "./Btn.vue";

    interface Props {
        type: keyof typeof Colors,
        to: string|object,
    }

    defineProps<Props>()
</script>

<template>
    <router-link type="button" :to="to" :class="'btn btn-' + type">
        <Btn :type="type"><slot></slot></Btn>
    </router-link>
</template>

<style scoped lang="scss">

</style>
