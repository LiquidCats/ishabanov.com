<script setup lang="ts">
//
import logoSvg from "../../assets/images/logo.svg";
import AppLink from "../atoms/AppLink.vue";
import {RouteNames} from "../../domain/enums/routes";

interface Props {
    size: 6|8
}

// Define
defineProps<Props>()
</script>

<template>
    <AppLink :to="{name: RouteNames.HOMEPAGE}">
        <img :src="logoSvg" alt="logo"  class="rounded" :class="{
            'size-6': size == 6,
            'size-8': size == 8,
        }">
    </AppLink>
</template>
