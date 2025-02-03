<script setup lang="ts">
import ComputerPng from "../../../assets/images/hero/computer.png"
import {TextSize} from "../../../../../kernel/enums/text";
import Text from "../../atoms/typography/Text.vue";
import Image from "../../atoms/illustration/Image.vue";
</script>

<template>
    <div class="p-5 bg-night flex flex-col justify-end items-center gap-3 rounded-xl">
        <Image :src="ComputerPng" alt="computer" class="max-w-48"/>
        <Text :size="TextSize.xl" class="text-gray-50">
            Passionate Coder, Tech Maestro, and Innovator. From music to fintech, I've coded it all using
            Go, PHP, JavaScript, Docker, Kubernetes, and more. Have a project or a groundbreaking idea? Let's connect and
            bring it to life!
        </Text>
    </div>
</template>

<style scoped lang="scss">

</style>
