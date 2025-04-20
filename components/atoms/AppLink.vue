<script setup lang="ts">

import type {NuxtLinkProps} from "#app";
import {NuxtLink} from "#components";


// define
defineOptions({
  inheritAttrs: false,
})

const props = defineProps<NuxtLinkProps>()

// state
const classes = ['text-gray-50', 'no-underline', 'hover:text-gray-400', 'duration-300', 'ease-in-out']

// compute
const isExternalLink = computed(() =>
    typeof props.to === "string"
        && (props.to.startsWith('http') || props.to.startsWith('mailto')))
</script>

<template>
  <component :is="isExternalLink ? `a` : NuxtLink"
             v-bind="{...$attrs, ...$props}"
             active-class="cursor-default hover:no-underline !text-gray-400"
             exact-active-class="cursor-default hover:no-underline !text-gray-400"
             :class="classes">
    <slot></slot>
  </component>
</template>

<style scoped lang="scss">

</style>
