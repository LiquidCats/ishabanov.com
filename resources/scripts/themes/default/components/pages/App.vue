<script setup lang="ts">
import AppFooter from "../organisms/AppFooter.vue";
import AppHeader from "../organisms/AppHeader.vue";

</script>

<template>
    <div class="container mx-auto max-w-5xl px-3">
        <AppHeader id="header"/>
        <main class="relative">
            <RouterView/>
        </main>

        <AppFooter id="footer"/>
    </div>
</template>
