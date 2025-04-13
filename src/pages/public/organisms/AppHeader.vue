<script setup lang="ts">

import NavMenu from "@/pages/public/molecules/NavMenu.vue";
import { settings } from "@/states/static";


</script>

<template>
    <header>
        <NavMenu :links="settings.menu" />
    </header>
</template>
