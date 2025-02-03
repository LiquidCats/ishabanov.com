<script setup lang="ts">
import {inject, Ref} from "vue";
import Backdrop from "../Backdrop.vue";

interface Props {
    for: string
}

defineProps<Props>()

const currentTab: Ref<string> = inject('currentTab')

</script>

<template>
    <Backdrop role="tabpanel" v-show="$props.for === currentTab">
        <slot></slot>
    </Backdrop>
</template>

<style scoped lang="scss">

</style>
