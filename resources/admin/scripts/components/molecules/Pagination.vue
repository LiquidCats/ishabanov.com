<script setup lang="ts">
import {ChevronLeftIcon, ChevronRightIcon} from "@heroicons/vue/24/outline"
import {ResponseLinks} from "../../types/api";
import Btn from "../atoms/Btn.vue";
import {Colors} from "../../types/colors";

interface Props {
  links: {current_page: number} & ResponseLinks
}

defineProps<Props>()

</script>

<template>
    <div class="flex justify-end items-center gap-2">
        <Btn v-if="links.prev"
             :type="Colors.primary"
             @click="$emit('click:prev', links.current_page-1)">
            <ChevronLeftIcon class="size-6"/> Prev
        </Btn>
        <Btn v-if="links.next"
             :type="Colors.primary"
             @click="$emit('click:next', links.current_page+1)">
            Next <ChevronRightIcon class="size-6"/>
        </Btn>
    </div>
</template>

<style scoped lang="scss">

</style>
