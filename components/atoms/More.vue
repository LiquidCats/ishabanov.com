<script setup lang="ts">
interface Props {
    as?: string
}

withDefaults(defineProps<Props>(), {
    as: 'div' as const
})
</script>

<template>
    <component :is="as" class="bg-gray-200 inline-flex flex-row rounded-full gap-2 items-center justify-center px-6 py-2">
        <div v-for="i in 3"  :key="i" class="bg-stone-400 rounded-full size-2"/>
    </component>
</template>
