<script setup lang="ts">
//
import logoSvg from "~/assets/images/logo.svg";
import AppLink from "~/components/atoms/AppLink.vue";

interface Props {
    size: 6|8
}

// Define
defineProps<Props>()
</script>

<template>
    <AppLink to="/">
        <img :src="logoSvg" alt="logo"
             class="rounded"
             :class="{
                'size-6': size == 6,
                'size-8': size == 8,
            }">
    </AppLink>
</template>
