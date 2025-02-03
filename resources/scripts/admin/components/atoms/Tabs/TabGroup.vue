<script setup lang="ts">
import {provide, Ref, ref} from "vue";

interface Props {
    selected: string
}

const props = defineProps<Props>()
const emits = defineEmits<{
    'select:tab': [value: string]
}>()

const currentTab = ref<string>(props.selected)

function selectTab(tabLabel: string): void {
    currentTab.value = tabLabel
    emits('select:tab', tabLabel)
}

provide<Ref<string>>('currentTab', currentTab)
provide<(tabLabel: string) => void>('tabSelector', selectTab)

</script>

<template>
    <div>
        <ul class="rounded-md bg-neutral-200 dark:bg-zinc-50/[.2] p-1.5 flex gap-1 mb-3" id="post-form-tabs" role="tablist">
            <slot name="labels" :tabSelector="selectTab"></slot>
        </ul>
        <slot name="panels"></slot>
    </div>

</template>

<style scoped lang="scss">

</style>
