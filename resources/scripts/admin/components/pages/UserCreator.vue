<script setup lang="ts">
import {computed, onMounted} from "vue";
//
import PageHeader from "../molecules/PageHeader.vue";
import FloatingPanel from "../molecules/FloatingPanel.vue";
import SaveButton from "../molecules/Buttons/SaveButton.vue";
import BackButton from "../molecules/Buttons/BackButton.vue";
//
import FormField from "../atoms/Form/FormField.vue";
import FormLabel from "../atoms/Form/FormLabel.vue";
import Backdrop from "../atoms/Backdrop.vue";
import Error from "../atoms/Error.vue";
//
import useUserState from "../../states/user";
import PasswordGenerator from "../molecules/User/PasswordGenerator.vue";

// define
const userState = useUserState()

// compute
const isValid = computed(() => {
    return Object.keys(userState.errors).length === 0
})
// act
function onPasswordGeneration(password: string) {
    const timer = setTimeout(() => {
        userState.item.password = password
        userState.item.password_confirmation = password
        clearTimeout(timer)
    })
}
// hooks
onMounted(() => {
    userState.$reset()
})

</script>

<template>
    <form>
        <FloatingPanel class="my-3">
            <BackButton />
            <SaveButton @click="userState.create()" :disabled="!isValid || userState.status.userSaving" />
        </FloatingPanel>
        <PageHeader class="mb-3">User{{ userState.item.name && `:`}} {{ userState.item.name }}</PageHeader>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
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
                <div class="mb-3">
                    <PasswordGenerator @click:generate="onPasswordGeneration"/>
                    <Error :errors="userState.errors" name="password" />
                </div>
            </Backdrop>
            <Backdrop class="dark:text-gray-50">
                Roles Under Construction
            </Backdrop>
        </div>
    </form>
</template>
