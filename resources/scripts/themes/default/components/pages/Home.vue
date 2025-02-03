<script setup lang="ts">
import Hero from "../organisms/Hero.vue";
import Experience from "../organisms/Experience.vue";
import useHomepageState from "../../states/homepage";
import {onMounted, onUnmounted} from "vue";

const homepageState = useHomepageState()

onMounted(() => {
    homepageState.loadHomepage()
})

onUnmounted(() => {
    homepageState.$reset()
})

</script>

<template>
    <Hero class="mb-3" />
    <Experience />
</template>
