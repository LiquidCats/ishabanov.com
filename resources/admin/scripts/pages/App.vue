<script setup lang="ts">

import Notifications from "../components/organisms/Notifications.vue";
import Nav from "../components/molecules/Sidebar/Nav.vue";



</script>

<template>
    <div class="dark:bg-stone-900 flex flex-nowrap items-stretch">
        <aside class="dark:bg-neutral-900 px-3 min-h-screen lg:min-w-60">
            <Nav/>
        </aside>
        <main class="grow min-h-screen">
            <RouterView/>
        </main>
    </div>

    <Notifications/>
</template>

<style scoped lang="scss">

</style>
