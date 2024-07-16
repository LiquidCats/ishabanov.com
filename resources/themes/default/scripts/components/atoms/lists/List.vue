<script setup lang="ts">
interface Props {
    ordered?: boolean
    unlisted?: boolean
}

withDefaults(defineProps<Props>(), {
    ordered: false,
    unlisted: false,
})

</script>

<template>
    <component :is="ordered ? 'ol' : 'ul'" :class="{'list-none': unlisted}" v-bind="$attrs"><slot></slot></component>
</template>
