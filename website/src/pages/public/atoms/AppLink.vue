<script setup lang="ts">

import {RouterLinkProps} from "vue-router";
import {computed} from "vue";
// define
defineOptions({
  inheritAttrs: false,
})

// define
const props = defineProps<RouterLinkProps>()

// state
const classes = ['text-gray-50', 'no-underline', 'hover:text-gray-400', 'duration-300', 'ease-in-out']

// compute
const isExternalLink = computed(() =>
    typeof props.to === "string"
        && (props.to.startsWith('http') || props.to.startsWith('mailto')))
</script>

<template>
    <a v-if="isExternalLink"
       v-bind="$attrs"
       :href="to as string"
       target="_blank"
       :class="classes"><slot/></a>
    <RouterLink v-else
                v-bind="{...$attrs, ...$props}"
                active-class="cursor-default hover:no-underline !text-gray-400"
                exact-active-class=""
                :class="classes">
        <slot></slot>
    </RouterLink>
</template>

<style scoped lang="scss">

</style>
