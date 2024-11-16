<script setup lang="ts">
import {Colors} from "../../../types/colors";
import Tag from "../../atoms/Tag.vue";
import RouteNames from "../../../enums/RouteNames";
import {RouterLink} from "vue-router";
import {CheckCircleIcon, XCircleIcon} from "@heroicons/vue/24/outline";

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
    <div class="flex flex-col rounded-md p-3 bg-neutral-50 dark:bg-zinc-700"
         :class="{'border border-indigo-500 dark:border-indigo-300': isCurrentUser}"
         :key="userId">
        <div class="relative">
            <RouterLink v-if="isCurrentUser"
                        :to="{name: RouteNames.USERS_EDIT, params: {user_id: userId}}">
                <span class="z-10 absolute -inset-1"></span>
            </RouterLink>
            <div class="flex gap-1 mb-3 relative">
                <Tag v-if="cachedUserId === userId" :type="Colors.secondary">Cached</Tag>
                <Tag :type="Colors.dark">ID: {{ userId }}</Tag>
                <Tag v-if="isCurrentUser" type="primary">It's you</Tag>
            </div>

            <div class="mb-3 pb-3 border-b border-neutral-300 dark:border-neutral-500">

                <div class="font-bold text-xl dark:text-gray-50">{{ name }}</div>
                <small class="text-sm text-gray-400">{{ email }}
                    <component :is="isVerified ? CheckCircleIcon : XCircleIcon"
                               class="size-5 inline-block p-0.5 rounded-full"
                               :class="{
                                        'bg-green-200 text-green-600': isVerified,
                                        'bg-red-200 text-red-600': !isVerified,
                                    }"/>
                </small>

            </div>
        </div>

        <div class="flex flex-row justify-end gap-1">
            <slot></slot>
        </div>
    </div>
</template>

<style scoped lang="scss">

</style>
