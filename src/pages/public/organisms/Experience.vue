<script setup lang="ts">

import type {ExperienceResource} from "@/types/api.ts";
import ExperienceCard from "@/pages/public/molecules/experience/ExperienceCard.vue";
import List from "@/pages/public/atoms/lists/List.vue";
import ListItem from "@/pages/public/atoms/lists/ListItem.vue";
import {homepage} from "@/states/static.ts";
</script>

<template>
    <section id="experience">
        <List class="group/list relative space-y-3 list-none">
            <ListItem v-for="item in homepage?.experiences" class="rounded-xl relative z-[3]">
                <ExperienceCard :experience="item as ExperienceResource"/>
            </ListItem>>
        </List>
    </section>
</template>
