<script setup lang="ts">

import NavMenu from "@/components/molecules/NavMenu.vue";
import { settings } from "@/states/static";


</script>

<template>
    <header>
        <NavMenu :links="settings.menu" />
    </header>
</template>
