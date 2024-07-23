<script setup lang="ts">

import PageHeader from "../molecules/PageHeader.vue";
import FloatingPanel from "../molecules/FloatingPanel.vue";
import RouteNames from "../../enums/RouteNames";
import {PlusIcon} from "@heroicons/vue/20/solid";
import BtnLink from "../atoms/BtnLink.vue";
import Pagination from "../molecules/Pagination.vue";
import TabGroup from "../atoms/Tabs/TabGroup.vue";
import TabPanel from "../atoms/Tabs/TabPanel.vue";
import TabLabel from "../atoms/Tabs/TabLabel.vue";

async function paginate(page: number) {
}
</script>

<template>
    <FloatingPanel>
        <BtnLink type="light" :to="{name: RouteNames.USERS_CREATE}">
            <PlusIcon class="size-5"/>Add
        </BtnLink>
        <Pagination :links="{} as any"
                    @click:next="paginate"
                    @click:prev="paginate"/>
    </FloatingPanel>
    <PageHeader class="mt-3">Users</PageHeader>
    <TabGroup selected="users">
        <template #labels>
            <TabLabel name="users">Users</TabLabel>
            <TabLabel name="roles">Roles</TabLabel>
        </template>
        <template #panels>
            <TabPanel for="users">Users</TabPanel>
            <TabPanel for="roles">Roles</TabPanel>
        </template>
    </TabGroup>
</template>
