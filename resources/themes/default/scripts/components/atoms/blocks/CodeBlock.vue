<script setup lang="ts">
interface Props {
    blockClasses: string
    blockContent: string
}

//define
defineProps<Props>()
</script>

<template>
    <pre class="my-3 rounded-md overflow-hidden p-0 font-mono h-auto mx-0">
        <code :class="['rounded-md','font-mono', blockClasses]">{{ blockContent }}</code>
    </pre>
</template>
