<script setup lang="ts">

import FormField from "../../atoms/Form/FormField.vue";
import FormLabel from "../../atoms/Form/FormLabel.vue";
import VerifiedBadge from "../../atoms/VerifiedBadge.vue";
import useUserState from "../../../states/user";
import {useRoute} from "vue-router";
import {computed, onMounted} from "vue";
import RouteNames from "../../../enums/RouteNames";

//define
const userState = useUserState()
const route = useRoute()

const userId: number = parseInt(route?.params?.user_id?.toString())

// compute
const isEditing = computed(() => route.name === RouteNames.USERS_EDIT)
// hooks
onMounted(async () => {
    if (useRoute().name !== RouteNames.USERS_EDIT) {
        return
    }

    if (userState.id !== userId) {
        await userState.getUser(userId)
    }
})
</script>

<template>
    <form>
        <fieldset>
            <legend class="font-light text-xl">Personal Info</legend>
            <div class="mb-3">
                <FormLabel for="user_name">Name</FormLabel>
                <FormField id="user_name"
                           v-model="userState.item.name"
                           placeholder="Name"/>
            </div>

            <div class="mb-3">
                <FormLabel for="user_email">Email</FormLabel>
                <div class="flex flex-row flex-nowrap gap-1">
                    <FormField id="user_email" placeholder="Email" v-model="userState.item.email"/>
                    <VerifiedBadge v-if="isEditing" :verified="userState.item.is_verified" />
                </div>

            </div>
        </fieldset>

        <fieldset>
            <legend class="font-light text-xl">Password</legend>
            <div class="mb-3" v-if="isEditing && userState.item.is_current_user">
                <FormLabel for="user_old_password">Current Password</FormLabel>
                <FormField id="user_old_password"
                           placeholder="Current Password"
                           v-model="userState.item.current_password"/>
            </div>
            <div class="mb-3">
                <FormLabel for="user_password">Password</FormLabel>
                <FormField id="user_password"
                           class="mb-3"
                           placeholder="Password"
                           v-model="userState.item.new_password"/>
                <FormField id="user_password_confirm"
                           placeholder="Password Confirm"
                           v-model="userState.item.password_confirm"/>
            </div>
        </fieldset>

    </form>
</template>

<style scoped lang="scss">

</style>
