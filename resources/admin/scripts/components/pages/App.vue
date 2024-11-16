<script setup lang="ts">

import Notifications from "../organisms/Notifications.vue";
import Nav from "../molecules/Sidebar/Nav.vue";

</script>

<template>
    <div class="flex flex-col-reverse md:flex-row flex-nowrap">
        <aside class="sticky bottom-0 z-10 md:min-h-screen p-3 bg-neutral-50 dark:bg-zinc-900 md:min-w-28">
            <Nav/>
        </aside>
        <main class="grow min-h-screen px-3">
            <RouterView/>
        </main>
    </div>

    <Teleport to="body">
        <Notifications/>
    </Teleport>
</template>

<style scoped lang="scss">

</style>
