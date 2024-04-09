<script setup lang="ts">
import {inject, Ref} from "vue";

interface Props {
    for: string
}

defineProps<Props>()

const currentTab: Ref<string> = inject('currentTab')

</script>

<template>
    <div class="mx-3" role="tabpanel" v-show="$props.for === currentTab">
        <slot></slot>
    </div>
</template>

<style scoped lang="scss">

</style>
