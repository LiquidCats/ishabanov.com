<script setup lang="ts">

import Btn from "../../atoms/Btn.vue";
import {ArrowLeftIcon} from "@heroicons/vue/24/outline";
import {useRouter} from "vue-router";

const router = useRouter()

</script>

<template>
    <Btn icon="ArrowLeftIcon" type="light" @click="router.back()">Back</Btn>
</template>

<style scoped lang="scss">

</style>
