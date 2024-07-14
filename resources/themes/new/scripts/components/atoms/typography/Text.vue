<script setup lang="ts">
import {TextFamily, TextSize} from "../../../domain/types/components";
import {computed} from "vue";

interface ParagraphProps {
    size?: TextSize
    family?: TextFamily
    component?: 'p' | 'div' | 'span'
}

const props = withDefaults(defineProps<ParagraphProps>(), {
    component: "p",
    family: TextFamily.mono,
})

const classNames = computed(() => [props.size, props.family].filter(Boolean).join(' '))
</script>

<template>
    <component :is="component" class="text-green-50" :class="classNames"><slot></slot></component>
</template>

<style scoped lang="scss">

</style>
