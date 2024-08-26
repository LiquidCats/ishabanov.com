<script setup lang="ts">

import Text from "../typography/Text.vue";

interface Props {
    blockClasses: string
    blockContent: string
}

// define
defineProps<Props>()

</script>

<template>
    <Text :class="blockClasses" v-html="blockContent" />
</template>
