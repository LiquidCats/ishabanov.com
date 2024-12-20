<script setup lang="ts">

import {onMounted} from "vue";
//
import RouteNames from "../../enums/RouteNames";
//
import PageHeader from "../molecules/PageHeader.vue";
import FloatingPanel from "../molecules/FloatingPanel.vue";
import UserListItem from "../organisms/User/UserListItem.vue";
//
import BtnLink from "../atoms/BtnLink.vue";
import Pagination from "../molecules/Pagination.vue";
import TabGroup from "../atoms/Tabs/TabGroup.vue";
import TabPanel from "../atoms/Tabs/TabPanel.vue";
import TabLabel from "../atoms/Tabs/TabLabel.vue";
import Btn from "../atoms/Btn.vue";
//
import useUsersState from "../../states/users";
import useUserState from "../../states/user";
import LoadingPlaceholder from "../atoms/LoadingPlaceholder.vue";
import NothingFound from "../atoms/NothingFound.vue";
import DeleteButton from "../molecules/Buttons/DeleteButton.vue";

const usersState = useUsersState()
const userState = useUserState()

onMounted(async () => {
    await usersState.getUsers(1)
})

</script>

<template>
    <FloatingPanel>
        <BtnLink icon="PlusIcon" type="light" :to="{name: RouteNames.USERS_CREATE}">Add</BtnLink>
        <Pagination :links="usersState.pagination"
                    @click:next="usersState.getUsers"
                    @click:prev="usersState.getUsers"/>
    </FloatingPanel>
    <PageHeader class="mt-3">Users</PageHeader>
    <TabGroup selected="users">
        <template #labels>
            <TabLabel name="users">Users</TabLabel>
            <TabLabel name="roles">Roles</TabLabel>
        </template>
        <template #panels>
            <TabPanel for="users" class="grid grid-cols-1 gap-3">
                <LoadingPlaceholder class="sm:col-span-2 lg:col-span-3" v-if="usersState.status.listLoading"/>
                <NothingFound class="sm:col-span-2 lg:col-span-3" v-else-if="usersState.items.length === 0"/>
                <UserListItem v-if="!usersState.status.listLoading" v-for="user in usersState.items"
                              :cached-user-id="userState.id"
                              :user-id="user.id"
                              :name="user.name"
                              :email="user.email"
                              :isVerified="user.is_verified"
                              :isCurrentUser="user.is_current_user"
                              :key="user.id">

                </UserListItem>
            </TabPanel>
            <TabPanel for="roles">Under Construction</TabPanel>
        </template>
    </TabGroup>
</template>
