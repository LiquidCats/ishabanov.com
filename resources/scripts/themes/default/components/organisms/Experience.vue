<script setup lang="ts">

import ExperienceCard from "../molecules/experience/ExperienceCard.vue";
import List from "../atoms/lists/List.vue";
import ListItem from "../atoms/lists/ListItem.vue";
import useHomepageState from "../../states/homepage";

const homepageState = useHomepageState()
</script>

<template>
    <section id="experience">
        <List class="group/list relative space-y-3 list-none">
            <ListItem v-for="item in homepageState?.data?.experiences" class="rounded-xl relative z-[3]">
                <ExperienceCard :experience="item"/>
            </ListItem>>
        </List>
    </section>
</template>
