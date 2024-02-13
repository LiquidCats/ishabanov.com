<script setup lang="ts">
    import type {Colors} from "../../types/colors";
    import Btn from "./Btn.vue";

    interface Props {
        type: Colors,
        icon?: string,
        to: string,
    }

    defineProps<Props>()
</script>

<template>
    <router-link type="button" :to="to" :class="'btn btn-' + type">
        <Btn :type="type" :icon="icon"><slot></slot></Btn>
    </router-link>
</template>

<style scoped lang="scss">

</style>
