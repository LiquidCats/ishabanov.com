<script setup lang="ts">
import Btn from "~/components/atoms/form/Btn.vue";
import {ChevronRightIcon, ChevronLeftIcon, ChevronsLeftIcon, ChevronsRightIcon} from "lucide-vue-next";
//
import type {ResponsePaginationMeta} from "~/types/api";

interface Props {
    pagination: ResponsePaginationMeta
    withFirst?: boolean
    withLast?: boolean
}

// define
withDefaults(defineProps<Props>(), {
    withFirst: false,
    withLast: false,
})

defineEmits(['click:first', 'click:last', 'click:prev', 'click:next'])
</script>

<template>
    <div class="flex items-center justify-center gap-3">
        <Btn v-if="withFirst" aria-label="first" @click="$emit('click:first', $event)">
            <ChevronsLeftIcon class="size-6"/>
        </Btn>
        <Btn v-if="pagination?.current_page !== 1" aria-label="previous" @click="$emit('click:prev', $event)">
            <ChevronLeftIcon class="size-6"/>
        </Btn>
        <Btn class="!rounded-full" disabled> {{ pagination?.current_page ?? 1 }} </Btn>
        <Btn v-if="pagination?.current_page !== pagination?.last_page" aria-label="next" @click="$emit('click:next', $event)">
            <ChevronRightIcon class="size-6"/>
        </Btn>
        <Btn v-if="withLast" aria-label="last" @click="$emit('click:last', $event)">
            <ChevronsRightIcon class="size-6"/>
        </Btn>
    </div>
</template>
