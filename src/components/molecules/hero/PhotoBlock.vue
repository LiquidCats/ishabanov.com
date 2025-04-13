<script setup lang="ts">
import PersonPng from "@/assets/images/hero/person.png"
import Image from "@/components/atoms/illustration/Image.vue";

</script>

<template>
    <div class="bg-gradient-to-l from-blue-500 to-blue-900 rounded-xl overflow-hidden flex justify-end items-end">
        <Image :src="PersonPng" alt="person" class="max-w-md" />
    </div>
</template>
