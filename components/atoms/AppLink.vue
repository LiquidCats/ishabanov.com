<script setup lang="ts">

import type {NuxtLinkProps} from "#app";
import {NuxtLink} from "#components";

// define
defineOptions({
  inheritAttrs: false,
})

defineProps<NuxtLinkProps>()

// state
const classes = ['text-gray-50', 'no-underline', 'hover:text-gray-400', 'duration-300', 'ease-in-out']

</script>

<template>
  <NuxtLink v-bind="{...$attrs, to: $props.to}"
            active-class="cursor-default hover:no-underline !text-gray-400"
            exact-active-class="cursor-default hover:no-underline !text-gray-400"
            :class="classes">
    <slot></slot>
  </NuxtLink>
</template>

<style scoped lang="scss">

</style>
