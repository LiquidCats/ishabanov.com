<script setup lang="ts">
interface Props {
    blockContent: string
}

//define
defineProps<Props>()

</script>

<template>
    <component is="div" v-html="blockContent" />
</template>
