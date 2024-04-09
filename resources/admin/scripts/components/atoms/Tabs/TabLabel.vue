<script setup lang="ts">
import {inject, Ref} from "vue";

interface Props {
    name: string
}

defineProps<Props>()

const currentTab: Ref<string> = inject('currentTab')
const tabSelector: (t: string) => void = inject('tabSelector')

</script>

<template>
    <li role="presentation" class="grow">
        <button class="block w-full px-3 py-1.5 text-md rounded"
                :class="{
                    'bg-neutral-50': name === currentTab,
                    'font-bold': name === currentTab,
                    'text-white': name !== currentTab,
                }"
                type="button"
                role="tab"
                id="pills-main-tab"
                aria-controls="pills-main"
                :aria-selected="name === currentTab ? 'true' : 'false'"
                @click="tabSelector(name)">
            <slot></slot>
        </button>
    </li>
</template>

<style scoped lang="scss">

</style>
