<script setup lang="ts">
import {computed, onMounted} from "vue";
import {useRoute, useRouter} from "vue-router";
import {ArrowDownOnSquareIcon, ArrowLeftIcon} from "@heroicons/vue/20/solid";
//
import PageHeader from "../molecules/PageHeader.vue";
import FloatingPanel from "../molecules/FloatingPanel.vue";
import OwnPasswordReset from "../molecules/User/OwnPasswordReset.vue";
//
import VerifiedBadge from "../atoms/VerifiedBadge.vue";
import FormField from "../atoms/Form/FormField.vue";
import FormLabel from "../atoms/Form/FormLabel.vue";
import Backdrop from "../atoms/Backdrop.vue";
import Btn from "../atoms/Btn.vue";
//
import useUserState from "../../states/user";
import RouteNames from "../../enums/RouteNames";
import SaveButton from "../molecules/Buttons/SaveButton.vue";
import BackButton from "../molecules/Buttons/BackButton.vue";

// define
const route = useRoute()
const router = useRouter()
const userState = useUserState()

const userId: number = parseInt(route?.params?.user_id?.toString())

// compute
const isEditing = computed(() => route.name === RouteNames.USERS_EDIT)
// hooks
onMounted(async () => {
    if (route.name !== RouteNames.USERS_EDIT) {
        return
    }

    if (userState.id !== userId) {
        await userState.getUser(userId)
    }
})

</script>

<template>
    <FloatingPanel class="my-3">
        <div>
            <BackButton />
        </div>

        <div>
            <SaveButton />
        </div>
    </FloatingPanel>
    <PageHeader class="mb-3">User: {{ userState.item.name }}</PageHeader>
    <Backdrop>
        <form>
            <fieldset>
                <legend class="font-bold text-lg">Personal Info</legend>
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
                        <VerifiedBadge v-if="isEditing" :verified="userState.item?.is_verified || false" />
                    </div>

                </div>
            </fieldset>

            <OwnPasswordReset v-if="userState.item.is_current_user" />
        </form>
    </Backdrop>

</template>
