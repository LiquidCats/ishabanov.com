<script setup lang="ts">
interface Props {
    src: string
}

// define
defineProps<Props>()
</script>

<template>
    <div class="bg-cover bg-no-repeat bg-center"
         :style="`background-image: url('${src}');`"><slot></slot></div>
</template>

<style scoped lang="scss">

</style>
