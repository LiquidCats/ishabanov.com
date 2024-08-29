<script setup lang="ts">

import {TextSize, TextWeight} from "../../../domain/enums/text";
import Heading from "../../atoms/typography/Heading.vue";
</script>

<template>
    <footer class="mt-6 mb-3">
        <Heading :level="4"
                 :size="TextSize.xl4"
                 :weight="TextWeight.light"
                 class="text-gray-50 mt-3">Similar</Heading>
        <div class="grid md:grid-cols-3 gap-3">
            <slot></slot>
        </div>
    </footer>
</template>

<style scoped lang="scss">

</style>
