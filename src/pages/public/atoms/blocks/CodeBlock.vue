<script setup lang="ts">
import {onMounted, ref} from "vue";
import hljs from "highlight.js/lib/core";

interface Props {
    blockContent: string
}

const elementRef = ref<HTMLElement>()

//define
defineProps<Props>()

onMounted(() => {
    hljs.highlightElement(elementRef.value?.children[0] as any)
})
</script>

<template>
    <pre ref="elementRef" class="my-3 rounded-md overflow-hidden p-0 font-mono h-auto mx-0">
        <code :class="['rounded-md','font-mono']">{{ blockContent }}</code>
    </pre>
</template>
