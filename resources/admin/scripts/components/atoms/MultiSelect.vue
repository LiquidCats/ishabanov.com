<script setup lang="ts">
import Tag from "./Tag.vue";
import {XMarkIcon} from "@heroicons/vue/20/solid";
import {computed, ref, watch} from "vue";

interface Item {
    text: string,
    value: number|string|null
}

interface Props {
    items?: any[]
    modelValue?: any[]
    mapper?: (v: any) => Item
}

const props = defineProps<Props>()

const emit = defineEmits(['select', 'input', 'update:modelValue'])

const inputRef = ref<null|HTMLInputElement>(null)
const itemsRef = ref<HTMLDivElement[]>([])
const shouldAutoScroll = ref(true)
const focusedItemIndex = ref<number|string>(-1)

const selectedItems = computed<Item[]>(() => props.modelValue?.map(mapItem))
const allItems = computed<Item[]>(() => props.items?.map(mapItem))
//
function focusUpperItem() {
    shouldAutoScroll.value = true
    if (focusedItemIndex.value <= 0) {
        focusedItemIndex.value = props.items?.length - 1
        return
    }

    focusedItemIndex.value = focusedItemIndex.value - 1
}

function focusDownItem() {
    shouldAutoScroll.value = true
    if (focusedItemIndex.value >= props.items?.length - 1) {
        focusedItemIndex.value = 0
        return
    }

    focusedItemIndex.value = focusedItemIndex.value + 1
}

watch(focusedItemIndex, (newValue, oldValue) => {
    if (newValue < 0) {
        return
    }
    if (newValue !== oldValue && shouldAutoScroll.value) {
        const elem: HTMLDivElement = itemsRef.value[newValue]
        elem.scrollIntoView({
            behavior: "smooth",
            block: "center"
        })
    }
})

function mapItem(v: any): Item {
    if (!props.mapper) {
        return v
    }

    return props.mapper(v)
}

function removeItem(item: Item) {
    const values = props.modelValue ?? []
    emit('update:modelValue', values.filter(i => mapItem(i).value !== item.value))
}

function selectItem(e: Event, index: number|string) {
    if (index < 0) {
        return;
    }

    const selectedItem = (props.items ?? [])[index]
    const mappedSelectedItem = mapItem(selectedItem)
    const hasItem = selectedItems.value.some(s => s.value === mappedSelectedItem.value)
    const values = props.modelValue ?? []

    if (hasItem) {
        emit('update:modelValue', values.filter(i => mapItem(i).value !== mappedSelectedItem.value))
        return
    }
    if (!hasItem) {
        emit('update:modelValue', [...props.modelValue, selectedItem])
        return
    }

    emit('select', e)
}

</script>

<template>
    <Popper offsetDistance="5 0"
            @click="inputRef?.focus()"
            placement="auto-start"
            class="relative w-full">
        <div class="flex flex-wrap gap-1 border text-lg rounded-md w-full p-1.5 bg-stone-600 border-stone-500 placeholder-gray-400 text-white focus:ring-stone-300 focus:border-stone-300 outline-none duration-300">
            <div class="flex gap-1 items-center">
                <Tag class="flex gap-1 items-center text-sm font-normal" v-for="selectedItem in selectedItems" type="primary">
                    {{ selectedItem?.text }}
                    <a @click="removeItem(selectedItem)" class="cursor-pointer">
                        <XMarkIcon class="size-4"/>
                    </a>
                </Tag>
            </div>
            <div class="grow flex">
                <input ref="inputRef"
                       class="outline-none border-0 w-full self-stretch bg-transparent"
                       type="text"
                       @focus="focusedItemIndex = 0"
                       @input="$emit('input', $event)"
                       @keydown.down="focusDownItem()"
                       @keydown.up="focusUpperItem()"
                       @keydown.enter="selectItem($event, focusedItemIndex)">
            </div>
        </div>

        <template #content>
            <div class="bg-gray-50">
                <div ref="itemsRef"
                     :id="`mselect-item-${index}`"
                     class="p-1"
                     @mouseover="focusedItemIndex = index; shouldAutoScroll = false"
                     @mouseleave="shouldAutoScroll = true"
                     @click="selectItem($event, index)"
                     :class="{
                                    'font-bold': selectedItems?.some(i => i.value === item.value),
                                    'bg-gray-700/[.1]': focusedItemIndex === index
                             }"
                     v-for="(item, index) in allItems">{{ item.text }}</div>
                <div v-if="allItems.length === 0" class="p-2 text-center">
                    <slot name="nothing">nothing found</slot>
                </div>
            </div>
        </template>
    </Popper>
</template>

<style scoped lang="scss">
    :deep(.popper) {
        border-radius: .25rem;
        max-height: 10rem;
        overflow: auto;
        width: 100%;
    }
</style>
