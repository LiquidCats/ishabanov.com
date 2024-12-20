<script setup lang="ts">
import Btn from "../atoms/Btn.vue";
import {computed, reactive} from "vue";
import FormControl from "../molecules/Form/FormControl.vue";
import PasswordGenerator from "../molecules/User/PasswordGenerator.vue";
import Error from "../atoms/Error.vue";
import UserApi from "../../api/users";

interface Props {
    usedId: number
}

const props = defineProps<Props>()

interface State {
    current_password: string
    new_password: string
    new_password_confirmation: string
}

const passwords = reactive<State>({} as State)

const canUpdate = computed(() => passwords?.current_password?.length >= 8)
function onPasswordGeneration(password: string) {
    const timer = setTimeout(() => {
        passwords.new_password = password
        passwords.new_password_confirmation = password
        clearTimeout(timer)
    })
}

function updatePassword() {
    UserApi.updatePassword(props.usedId, passwords)
}

</script>
<template>
    <form>
        <FormControl v-model="passwords.current_password"
                     class="mb-3"
                     type="password"
                     name="current_password"
                     placeholder="Current Password"
                     :errors="{}" />

        <div class="mb-3">
            <PasswordGenerator @click:generate="onPasswordGeneration"/>
            <Error :errors="{}" name="new_password" />
        </div>

        <div class="text-right">
            <Btn :disabled="!canUpdate" @click="updatePassword" type="primary">Update</Btn>
        </div>
    </form>
</template>
