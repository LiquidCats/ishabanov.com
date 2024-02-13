<script setup lang="ts">
interface Props {
    active: boolean
}
defineEmits(['select'])
defineProps<Props>()
</script>

<template>
    <li role="presentation" class="grow">
        <button class="block w-full px-3 py-1.5 text-md rounded"
                :class="{
                    'bg-neutral-50': active,
                    'font-bold': active,
                    'text-white': !active,
                }"
                type="button"
                role="tab"
                id="pills-main-tab"
                aria-controls="pills-main"
                :aria-selected="active ? 'true' : 'false'"
                @click="$emit('select', $event)">
            <slot></slot>
        </button>
    </li>
</template>

<style scoped lang="scss">

</style>
