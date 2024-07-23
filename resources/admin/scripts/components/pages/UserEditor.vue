<script setup lang="ts">

import FloatingPanel from "../molecules/FloatingPanel.vue";
import PageHeader from "../molecules/PageHeader.vue";
import TabGroup from "../atoms/Tabs/TabGroup.vue";
import TabPanel from "../atoms/Tabs/TabPanel.vue";
import TabLabel from "../atoms/Tabs/TabLabel.vue";
</script>

<template>
    <FloatingPanel class="mb-3">
        test
    </FloatingPanel>
    <PageHeader class="mb-3">User</PageHeader>
    <TabGroup selected="info">
        <template #labels>
            <TabLabel name="info">Info</TabLabel>
            <TabLabel name="2fa">MFA</TabLabel>
            <TabLabel name="role">Role</TabLabel>
        </template>
        <template #panels>
            <TabPanel for="info">Info</TabPanel>
            <TabPanel for="2fa">MFA</TabPanel>
            <TabPanel for="role">Role</TabPanel>
        </template>
    </TabGroup>
</template>
