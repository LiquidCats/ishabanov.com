<script setup lang="ts">
import {TextFamily, TextSize, TextWeight} from "~/enums/text";
import {computed} from "vue";

interface Props {
    level?: 1 | 2 | 3 | 4 | 5 | 6
    size?: TextSize
    weight?: TextWeight
    family?: TextFamily
}

const props = withDefaults(defineProps<Props>(), {
    level: 1,
})

const classes = computed(() => [props.family, props.size, props.weight].filter(Boolean))
</script>

<template>
    <component :is="`h${level}`" :class="classes" class="mb-1.5 mt-1">
        <slot/>
    </component>
</template>

