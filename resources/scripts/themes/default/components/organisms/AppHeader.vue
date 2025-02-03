<script setup lang="ts">
import useSettingsState from "../../states/settings";
import NavMenu from "../molecules/NavMenu.vue";

const settings = useSettingsState()

</script>

<template>
    <header>
        <NavMenu :links="settings.menu" />
    </header>
</template>
