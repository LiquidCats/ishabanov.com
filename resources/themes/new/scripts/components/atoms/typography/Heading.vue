<script setup lang="ts">
import {TextFamily, TextSize, TextWeight} from "../../../domain/types/components";
import {computed} from "vue";
// Props
interface HeadingProps {
    size?: TextSize;
    family?: TextFamily;
    weight?: TextWeight;
    level?: 1 | 2 | 3 | 4 | 5 | 6;
}
// Define
const props = withDefaults(defineProps<HeadingProps>(), {
    level: 1,
    family: TextFamily.mono,
})
// Compute
const headingTag = computed(() => `h${props.level}`);
const classNames = computed(() => [props.size, props.family, props.weight].filter(Boolean).join(' '))
</script>

<template>
    <component :is="headingTag" class="text-gray-50" :class="classNames">
        <slot></slot>
    </component>
</template>

<style scoped lang="scss">

</style>
