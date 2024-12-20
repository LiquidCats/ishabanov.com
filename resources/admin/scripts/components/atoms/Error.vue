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
    <div class="text-xs my-1 text-red-400 dark:text-red-300" role="alert" v-if="messages.length">
        <ul class="m-0">
            <li v-for="message in messages">{{ message }}</li>
        </ul>
    </div>
</template>

<style scoped lang="scss">

</style>
