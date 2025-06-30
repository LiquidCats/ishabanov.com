<script setup lang="ts">
import {cn} from "@/lib/utils";
import type {HTMLAttributes} from "vue";

interface Props {
  as?: 'p' | 'div' | 'span' | 'small'
  inverted?: boolean
  class?: HTMLAttributes['class']
}

const props = withDefaults(defineProps<Props>(), {
  as: "p",
  inverted: false,
})


const classes = [
  !props.inverted && 'text-zinc-800',
  !props.inverted && 'dark:text-zinc-50',
  //
  props.inverted && 'text-zinc-50',
  props.inverted && 'dark:text-zinc-800',
]

</script>

<template>
    <component :is="as" :class="cn(classes, props.class)">
        <slot></slot>
    </component>
</template>
