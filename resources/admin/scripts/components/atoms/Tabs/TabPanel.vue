<script setup lang="ts">
import {inject, Ref} from "vue";

interface Props {
    for: string
}

defineProps<Props>()

const currentTab: Ref<string> = inject('currentTab')

</script>

<template>
    <div class="bg-neutral-200 dark:bg-zinc-800 p-3 rounded-md" role="tabpanel" v-show="$props.for === currentTab">
        <slot></slot>
    </div>
</template>

<style scoped lang="scss">

</style>
