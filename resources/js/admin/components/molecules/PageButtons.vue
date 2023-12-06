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
    <div class="mb-3 d-flex gap-2">
        <Btn :type="Colors.dark" icon="arrow-left" @click="router.back()">Back</Btn>
        <Btn :type="Colors.primary"
             icon="floppy"
             @click.prevent="$emit('click:save', $event)"
             :disabled="disable"
             :class="{'disabled': disable}">Save</Btn>
    </div>
</template>

<style scoped>

</style>
