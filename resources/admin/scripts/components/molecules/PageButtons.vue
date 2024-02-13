<script setup lang="ts">

import {useRouter} from "vue-router";
//
import Btn from "../atoms/Btn.vue";
import {Colors} from "../../types/colors";

const router = useRouter()

defineProps({
    disable: {
        default: false,
        type: Boolean,
        required: true
    }
})

</script>

<template>
    <div class="flex gap-2">
        <Btn class="grow"
             :type="Colors.dark"
             icon="arrow-left" @click="router.back()">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd" d="M14 8a.75.75 0 0 1-.75.75H4.56l3.22 3.22a.75.75 0 1 1-1.06 1.06l-4.5-4.5a.75.75 0 0 1 0-1.06l4.5-4.5a.75.75 0 0 1 1.06 1.06L4.56 7.25h8.69A.75.75 0 0 1 14 8Z" clip-rule="evenodd" />
            </svg>
            Back
        </Btn>
        <Btn class="grow"
             :type="Colors.primary"
             @click.prevent="$emit('click:save', $event)"
             :disabled="disable">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                <path d="M13.75 7h-3v5.296l1.943-2.048a.75.75 0 0 1 1.114 1.004l-3.25 3.5a.75.75 0 0 1-1.114 0l-3.25-3.5a.75.75 0 1 1 1.114-1.004l1.943 2.048V7h1.5V1.75a.75.75 0 0 0-1.5 0V7h-3A2.25 2.25 0 0 0 4 9.25v7.5A2.25 2.25 0 0 0 6.25 19h7.5A2.25 2.25 0 0 0 16 16.75v-7.5A2.25 2.25 0 0 0 13.75 7Z" />
            </svg>

            Save
        </Btn>
    </div>
</template>

<style scoped lang="scss">

</style>
