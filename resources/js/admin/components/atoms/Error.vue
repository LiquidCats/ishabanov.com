<script setup lang="ts">
import type {ValidationErrors} from "../../types/api";
import {computed} from "vue";

interface Props {
    errors: ValidationErrors
    name: string
}

const props = defineProps<Props>()

const messages = computed(() => props.errors[props.name] || [])
</script>

<template>
    <div class="alert alert-danger mt-1 p-1 small" role="alert" v-if="messages.length">
        <ul class="m-0">
            <li v-for="message in messages">{{ message }}</li>
        </ul>
    </div>
</template>

<style scoped>

</style>
