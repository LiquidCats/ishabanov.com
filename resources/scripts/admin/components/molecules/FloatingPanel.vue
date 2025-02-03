<script setup lang="ts">

import Backdrop from "../atoms/Backdrop.vue";
</script>

<template>
    <Backdrop class="flex flex-row justify-between gap-1.5 sticky top-1 z-10 w-full">
        <slot></slot>
    </Backdrop>
</template>

<style scoped lang="scss">

</style>
