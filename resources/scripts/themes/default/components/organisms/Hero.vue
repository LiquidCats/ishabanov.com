<script setup lang="ts">

import DescriptionBlock from "../molecules/hero/DescriptionBlock.vue";
import PhotoBlock from "../molecules/hero/PhotoBlock.vue";
import YearsBlock from "../molecules/hero/YearsBlock.vue";
import BlogBlock from "../molecules/hero/BlogBlock.vue";
import SocialsBlock from "../molecules/hero/SocialsBlock.vue";
import useSettingsState from "../../states/settings";
import useHomepageState from "../../states/homepage";

const settingState = useSettingsState()
const homepageState = useHomepageState()
</script>

<template>
    <section id="#hero" class="grid grid-cols-1 gap-3 min-h-screen">
        <div class="grid grid-cols-3 md:grid-cols-6 md:grid-rows-6 gap-3">
            <DescriptionBlock class="col-span-3 md:row-span-4" />
            <PhotoBlock class="col-span-3 md:row-span-5"/>
            <YearsBlock :years="homepageState?.data?.years" class="md:row-span-2"/>
            <BlogBlock class="col-span-2 md:row-span-2"/>
            <SocialsBlock v-for="item in settingState.socials" :item="item" />
        </div>
    </section>
</template>

<style scoped lang="scss">

</style>
