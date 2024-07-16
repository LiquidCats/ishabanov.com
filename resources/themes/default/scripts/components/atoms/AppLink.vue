<script setup lang="ts">

import {RouterLinkProps} from "vue-router";

// define
defineOptions({
  inheritAttrs: false,
})

defineProps<RouterLinkProps>()
</script>

<template>
    <RouterLink v-bind="{...$attrs, ...$props}"
                active-class="cursor-default hover:no-underline !text-gray-400"
                exact-active-class=""
                class="text-gray-50 hover:underline">
        <slot></slot>
    </RouterLink>
</template>

<style scoped lang="scss">

</style>
