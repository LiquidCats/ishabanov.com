<script setup lang="ts">
import {ResponseLinks} from "../../types/api";
import Btn from "../atoms/Btn.vue";
import {Colors} from "../../types/colors";

interface Props {
  links: {current_page: number} & ResponseLinks
}

defineProps<Props>()

</script>

<template>
    <div class="d-flex justify-content-end align-items-center mb-3 gap-2">
        <Btn v-if="links.prev"
             :type="Colors.primary"
             @click="$emit('click:prev', links.current_page-1)">Prev</Btn>
        <Btn v-if="links.next"
             :type="Colors.primary"
             @click="$emit('click:next', links.current_page+1)">Next</Btn>
    </div>
</template>

<style scoped>

</style>
