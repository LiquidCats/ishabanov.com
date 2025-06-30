<script setup lang="ts">
import AppHeader from "@/components/organisms/AppHeader.vue";
import AppFooter from "@/components/organisms/AppFooter.vue";



</script>

<template>
  <AppHeader id="header"/>

  <main class="px-3 space-y-3">
    <slot></slot>
  </main>

  <AppFooter id="footer"/>
</template>