<script setup lang="ts">
import Tag from "./Tag.vue";
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
    <Popper offsetDistance="0"
            @click="inputRef?.focus()"
            placement="auto-start"
            class="mselect position-relative">
        <div class="mselect__field d-flex flex-wrap col gap-1 border border-1 border-light-subtle rounded-3 p-2">
            <Tag v-for="selectedItem in selectedItems" type="secondary" class="fs-6 fw-normal">
                {{ selectedItem?.text }} <i class="bi bi-x-lg" style="cursor: pointer" @click="removeItem(selectedItem)"/>
            </Tag>
            <div class="mselect__input col">
                <input ref="inputRef"
                       class="align-self-stretch"
                       type="text"
                       @focus="focusedItemIndex = 0"
                       @input="$emit('input', $event)"
                       @keydown.down="focusDownItem()"
                       @keydown.up="focusUpperItem()"
                       @keydown.enter="selectItem($event, focusedItemIndex)">
            </div>
        </div>

        <template #content>
            <div ref="itemsRef"
                 :id="`mselect-item-${index}`"
                 class="mselect__item p-2 fs-5 rounded-3"
                 @mouseover="focusedItemIndex = index; shouldAutoScroll = false"
                 @mouseleave="shouldAutoScroll = true"
                 @click="selectItem($event, index)"
                 :class="{
                        'active': selectedItems?.some(i => i.value === item.value),
                        'focused': focusedItemIndex === index
                 }"
                 v-for="(item, index) in allItems">{{ item.text }}</div>
            <div v-if="allItems.length === 0" class="p-2 text-center">
                <slot name="nothing">nothing found</slot>
            </div>
        </template>
    </Popper>
</template>

<style scoped lang="scss">
    :deep(.popper) {
        background-color: var(--bs-white);
        padding: .5rem;
        max-height: 10rem;
        overflow: auto;
        width: 100%;
        border-radius: .5rem;
        border: 1px solid;
        box-shadow: var(--bs-box-shadow);
        border-color: var(--bs-gray-300);
    }
    :deep(.popper:hover) {
        background-color: var(--bs-white);
    }

    :deep( > div:not(.popper)) {
        display: flex;
        gap: .5rem;
    }
    .mselect {
        display: block !important;
        &__item {
            &.focused {
                background: var(--bs-light);
            }
            &.active {
                font-weight: bold;
            }
        }
        &__input {
            min-width: 50%;
            & input {
                display: block;
                border: none;
                min-width: 50%;
                width: 100%;
                font-size: 1rem;
                font-weight: 400;
                line-height: 1.5;
                appearance: none;
                background-color: var(--bs-body-bg);
                background-clip: padding-box;
                transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
                &:focus {
                    color: var(--bs-body-color);
                    background-color: var(--bs-body-bg);
                    border: none;
                    outline: 0;
                    //box-shadow: 0 0 0 0.25rem rgba(13,110,253,.25);
                }
            }
        }
    }
</style>
