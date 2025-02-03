<script setup lang="ts">

import {CheckCircleIcon, XCircleIcon} from "@heroicons/vue/24/outline";

interface Props {
    verified: boolean
}

defineProps<Props>()

</script>

<template>
    <div>
        <div v-if="verified" class="bg-green-200 rounded-md flex content-center items-center justify-center p-2">
            <CheckCircleIcon class="size-6 text-green-600"/>
        </div>
        <div v-if="!verified" class="bg-red-200 rounded-md flex content-center items-center justify-center p-2">
            <XCircleIcon class="size-6 text-red-600"/>
        </div>
    </div>
</template>

<style scoped lang="scss">

</style>
