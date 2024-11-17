<script setup lang="ts">

import {onMounted} from "vue";
import {PlusIcon, TrashIcon, CheckIcon} from "@heroicons/vue/20/solid";
//
import {Colors} from "../../types/colors";
import RouteNames from "../../enums/RouteNames";
//
import PageHeader from "../molecules/PageHeader.vue";
import FloatingPanel from "../molecules/FloatingPanel.vue";
import UserListItem from "../molecules/User/UserListItem.vue";
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

const usersState = useUsersState()
const userState = useUserState()

onMounted(async () => {
    await usersState.getUsers(1)
})

</script>

<template>
    <FloatingPanel>
        <BtnLink type="light" :to="{name: RouteNames.USERS_CREATE}">
            <PlusIcon class="size-5"/>Add
        </BtnLink>
        <Pagination :links="{} as any"
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
            <TabPanel for="users" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
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
                    <Btn v-if="!user.is_verified"
                         size="small"
                         @click="usersState.verify(user.id)"
                         :disabled="user.is_current_user || usersState.status.userRemoving.includes(user.id)"
                         :type="Colors.success">
                        <CheckIcon class="size-6 md:size-3" />
                        <span class="hidden md:inline">Verify</span>
                    </Btn>
                    <Btn size="small"
                         @click="usersState.remove(user.id)"
                         :disabled="user.is_current_user || usersState.status.userRemoving.includes(user.id)"
                         :type="Colors.danger">
                        <TrashIcon class="size-6 md:size-3" />
                        <span class="hidden md:inline">Delete</span>
                    </Btn>
                </UserListItem>
            </TabPanel>
            <TabPanel for="roles">Under Construction</TabPanel>
        </template>
    </TabGroup>
</template>
