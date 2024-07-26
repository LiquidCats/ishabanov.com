<script setup lang="ts">
import Btn from "../atoms/form/Btn.vue";
import {ChevronRightIcon, ChevronLeftIcon, ChevronDoubleLeftIcon, ChevronDoubleRightIcon} from "@heroicons/vue/24/outline";
//
import type {ResponsePaginationMeta} from "../../domain/types/api";

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
            <ChevronDoubleLeftIcon class="size-6"/>
        </Btn>
        <Btn v-if="pagination?.current_page !== 1" aria-label="previous" @click="$emit('click:first', $event)">
            <ChevronLeftIcon class="size-6"/>
        </Btn>
        <Btn class="!rounded-full" disabled> {{ pagination?.current_page ?? 1 }} </Btn>
        <Btn v-if="pagination?.current_page !== pagination?.last_page" aria-label="next" @click="$emit('click:next', $event)">
            <ChevronRightIcon class="size-6"/>
        </Btn>
        <Btn v-if="withLast" aria-label="last" @click="$emit('click:last', $event)">
            <ChevronDoubleRightIcon class="size-6"/>
        </Btn>
    </div>
</template>
