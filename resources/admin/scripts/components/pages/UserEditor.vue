<script setup lang="ts">

import PageButtons from "../organisms/Post/PageButtons.vue";
import InfoPanel from "../organisms/User/InfoPanel.vue";
import PageHeader from "../molecules/PageHeader.vue";
import TabGroup from "../atoms/Tabs/TabGroup.vue";
import TabPanel from "../atoms/Tabs/TabPanel.vue";
import TabLabel from "../atoms/Tabs/TabLabel.vue";

</script>

<template>
    <PageButtons></PageButtons>
    <PageHeader class="mb-3">User</PageHeader>
    <TabGroup selected="info">
        <template #labels>
            <TabLabel name="info">Info</TabLabel>
            <TabLabel name="role">Role</TabLabel>
        </template>
        <template #panels>
            <TabPanel for="info">
                <InfoPanel/>
            </TabPanel>
            <TabPanel for="role">Under Construction</TabPanel>
        </template>
    </TabGroup>
</template>
