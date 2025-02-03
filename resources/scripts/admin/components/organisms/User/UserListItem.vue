<script setup lang="ts">
import {RouterLink} from "vue-router";

import useUsersState from "@admin/states/users";
import RouteNames from "@admin/domain/enums/RouteNames";
import {Icons} from "@admin/utils/icons";

import Btn from "@admin/components/atoms/Btn.vue";
import Tag from "@admin/components/atoms/Tag.vue";
import Paper from "@admin/components/atoms/Paper.vue";
import DeleteButton from "@admin/components/molecules/Buttons/DeleteButton.vue";

const usersState = useUsersState()

interface Props {
    cachedUserId: number
    userId: number
    name: string
    email: string
    isVerified: boolean
    isCurrentUser: boolean
}

defineProps<Props>()
</script>

<template>
    <Paper :key="userId" class="flex flex-row flex-nowrap gap-1">
        <div class="grow relative overflow-clip flex flex-row gap-1.5">
            <div>
                <Tag type="dark">ID: {{ userId }}</Tag>
            </div>
            <div v-if="isVerified">
                <component :is="Icons.CheckBadgeIcon" class="size-6 text-indigo-600 dark:text-indigo-400 inline-block"/>
            </div>

            <div>
                <div class="font-bold text-xl dark:text-gray-50">{{ name }}</div>
                <small class="text-xs text-gray-400 block">{{ email }}</small>
            </div>
            <RouterLink :to="{name: RouteNames.USERS_EDIT, params: {user_id: userId}}">
                <span class="z-10 absolute -inset-1"></span>
            </RouterLink>
        </div>

        <div v-if="!isCurrentUser">
            <Btn :icon="isVerified ? 'XMarkIcon' : 'CheckIcon'"
                 :type="isVerified ? 'warning' : 'success'"
                 @click="usersState.verify(userId)"
                 :disabled="isCurrentUser || usersState.status.userVerifying.includes(userId)">
                {{ isVerified ? 'Block' : 'Verify' }}
            </Btn>
        </div>
        <div v-if="!isCurrentUser">
            <DeleteButton
                @click="usersState.remove(userId)"
                :disabled="isCurrentUser || usersState.status.userRemoving.includes(userId)" />
        </div>

    </Paper>
</template>

<style scoped lang="scss">

</style>
