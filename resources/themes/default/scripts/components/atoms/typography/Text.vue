<script setup lang="ts">
import {TextFamily, TextSize, TextWeight} from "../../../domain/enums/text";
import {computed} from "vue";

interface Props {
    size?: TextSize
    weight?: TextWeight
    family?: TextFamily
    as?: 'p' | 'div' | 'span' | 'small'
}

const props = withDefaults(defineProps<Props>(), {
    as: "p",
})

const classes = computed(() => [props.family, props.size, props.weight].filter(Boolean))

</script>

<template>
    <component :is="as" :class="classes">
        <slot></slot>
    </component>
</template>
