<script setup lang="ts">
    import type {Colors} from "../../domain/types/colors";
    import Btn from "./Btn.vue";
    import {Icons} from "../../utils/icons";

    interface Props {
        type: keyof typeof Colors,
        to: string|object,
        icon?: keyof typeof Icons,
    }

    defineProps<Props>()
</script>

<template>
    <router-link type="button" :to="to" :class="'btn btn-' + type">
        <Btn :icon="icon" :type="type"><slot></slot></Btn>
    </router-link>
</template>

<style scoped lang="scss">

</style>
