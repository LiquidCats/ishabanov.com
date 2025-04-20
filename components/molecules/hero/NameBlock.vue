<script setup lang="ts">

import {TextWeight} from "~/enums/text";
import Text from "~/components/atoms/typography/Text.vue";
</script>

<template>
    <div>
        <Text as="span"
              class="text-gray-500 text-[12rem] leading-[8rem] transform translate-y-1"
              :weight="TextWeight.black">
            iShabanov
        </Text>
    </div>
</template>
