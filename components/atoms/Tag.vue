<script setup lang="ts">

import {Hash} from "lucide-vue-next";

</script>

<template>
    <span class="inline-flex items-center flex-nowrap text-nowrap justify-center bg-gray-100 text-stone-800 py-0.5 px-1.5 rounded-xs text-sm">
        <Hash class="size-4"/><slot/>
    </span>
</template>
