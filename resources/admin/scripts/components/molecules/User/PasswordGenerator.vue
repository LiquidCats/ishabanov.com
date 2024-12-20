<script setup lang="ts">
import {EyeIcon, EyeSlashIcon, ArrowPathIcon, DocumentDuplicateIcon} from "@heroicons/vue/24/outline"
import {onMounted, ref} from "vue";
import {generatePassword} from "../../../utils/password";

const emit = defineEmits([
    'click:generate',
    'click:copy',
])

const showPassword = ref<boolean>(false)
const password = ref<string>(generatePassword())

function regeneratePassword() {
    password.value = generatePassword()
    emit('click:generate', password.value)
}

async function copyToClipboard() {
    await navigator.clipboard.writeText(password.value)
    emit('click:copy', password.value)
}
onMounted(() => {
    emit('click:generate', password.value)
})
</script>

<template>
    <div class="bg-neutral-100 dark:bg-zinc-600 rounded-md dark:text-gray-50 p-3 w-full border border-stone-500 hover:border-stone-400 duration-300 ease-in-out">
        <div class="text-xs">Password</div>
        <div class="bg-neutral-200 rounded-md py-1.5 px-3 flex items-center">
            <div class="grow font-mono">
                {{ showPassword ? password : "*".repeat(8)}}
            </div>
            <ArrowPathIcon class="size-8 p-1 cursor-pointer duration-300 rounded-md hover:bg-gray-300" @click.prevent="regeneratePassword"/>
            <DocumentDuplicateIcon class="size-8 p-1 cursor-pointer duration-300 rounded-md hover:bg-gray-300" @click.prevent="copyToClipboard"/>
            <component :is="showPassword ? EyeIcon : EyeSlashIcon" @click.prevent="showPassword = !showPassword" class="size-8 p-1 cursor-pointer duration-300 rounded-md hover:bg-gray-300"></component>
        </div>

    </div>
</template>

<style scoped lang="scss">

</style>
