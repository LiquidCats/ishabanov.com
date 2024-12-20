<script setup lang="ts">

import {onMounted} from "vue";
import {useRoute} from "vue-router";
import useUserState from "../../states/user";
import RouteNames from "../../enums/RouteNames";
import ChangeOwnPassword from "../organisms/ChangeOwnPassword.vue"
import BackButton from "../molecules/Buttons/BackButton.vue";
import FloatingPanel from "../molecules/FloatingPanel.vue";
import PageHeader from "../molecules/PageHeader.vue";
import Backdrop from "../atoms/Backdrop.vue";
import Error from "../atoms/Error.vue";
import FormLabel from "../atoms/Form/FormLabel.vue";
import FormField from "../atoms/Form/FormField.vue";
import Btn from "../atoms/Btn.vue";
// state
const route = useRoute()
const userState = useUserState()

const userId: number = parseInt(route?.params?.user_id?.toString())
// compute

// act
async function save() {
    if (route.name !== RouteNames.USERS_EDIT) {
        await userState.create()
        return
    }
}

// hooks
onMounted(async () => {
    if (useRoute().name !== RouteNames.USERS_EDIT) {
        userState.$reset()
        return
    }

    if (userState.id !== userId) {
        await userState.getUser(userId)
    }
})
</script>

<template>
    <form>
        <FloatingPanel class="my-3">
            <BackButton />
        </FloatingPanel>
        <PageHeader class="mb-3">User{{ userState.item.name && `:`}} {{ userState.item.name }}</PageHeader>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
            <div class="grid grid-cols-1 gap-3">
                <Backdrop>
                    <div class="mb-3">
                        <FormLabel for="user_name">Name</FormLabel>
                        <FormField id="user_name"
                                v-model="userState.item.name"
                                placeholder="Name"/>
                        <Error :errors="userState.errors" name="name" />
                    </div>

                    <div class="mb-3">
                        <FormLabel for="user_email">Email</FormLabel>
                        <FormField id="user_email" placeholder="Email" v-model="userState.item.email"/>
                        <Error :errors="userState.errors" name="email" />
                    </div>
                    <div class="text-right">
                        <Btn type="primary">Update</Btn>
                    </div>
                </Backdrop>
                <Backdrop>
                    <ChangeOwnPassword :used-id="userState.item.id"/>
                </Backdrop>
                <Backdrop class="flex">
                    <div class="grow">2FA</div>
                    <Btn type="dark">Reset</Btn>
                </Backdrop>
            </div>
            <Backdrop class="dark:text-gray-50">
                Roles Under Construction
            </Backdrop>
        </div>
    </form>
</template>

<style scoped lang="scss">

</style>
