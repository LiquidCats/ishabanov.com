<script setup lang="ts">

import Btn from "../../atoms/Btn.vue";
import {ArrowLeftIcon} from "@heroicons/vue/20/solid";
import {useRouter} from "vue-router";

const router = useRouter()

</script>

<template>
    <Btn type="light" @click="router.back()">
        <ArrowLeftIcon class="size-6"/> Back
    </Btn>
</template>

<style scoped lang="scss">

</style>
