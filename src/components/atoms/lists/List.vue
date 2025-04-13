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
    <component :is="ordered ? 'ol' : 'ul'" class="list-inside" :class="{
        'list-disc': !ordered && !unlisted,
        'list-decimal': ordered && !unlisted,
        'list-none': unlisted
    }" v-bind="$attrs"><slot /></component>
</template>
