<script setup lang="ts">

import FormField from "../../atoms/Form/FormField.vue";
import FormLabel from "../../atoms/Form/FormLabel.vue";

interface Props {
  currentPassword: string
  newPassword: string
  newPasswordConfirm: string
}

defineProps<Props>()

</script>

<template>
  <fieldset>
    <legend class="font-bold text-lg">Password Reset</legend>
    <div class="mb-3">
      <FormLabel for="user_old_password">Current Password</FormLabel>
      <FormField id="user_old_password"
                 type="password"
                 placeholder="Current Password"
                 :model-value="currentPassword"/>
    </div>
    <div class="mb-3">
      <FormLabel for="user_password">New Password</FormLabel>
      <FormField id="user_password"
                 class="mb-3"
                 type="password"
                 placeholder="New Password"
                 :model-value="newPassword"/>
      <FormField id="user_password_confirm"
                 type="password"
                 placeholder="New Password Confirm"
                 :model-value="newPasswordConfirm"/>
    </div>
  </fieldset>
</template>

<style scoped lang="scss">

</style>
