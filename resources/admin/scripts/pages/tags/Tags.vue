<script setup lang="ts">

import {onMounted, ref, watch} from "vue";
import {ChevronUpIcon, ChevronDownIcon, XMarkIcon, ArrowDownOnSquareIcon, TrashIcon, PencilSquareIcon} from "@heroicons/vue/20/solid";
//
import type {Tag as TagType} from "../../types/data";
import {Colors} from "../../types/colors";
//
import useTagsState from "../../states/tags";
//
import debounce from "../../utils/debounce";
//
import Tag from "../../components/atoms/Tag.vue";
import PageHeader from "../../components/molecules/PageHeader.vue";
import Btn from "../../components/atoms/Btn.vue";

import FormField from "../../components/atoms/Form/FormField.vue";
import FormLabel from "../../components/atoms/Form/FormLabel.vue";
import {SubscriptionCallback} from "pinia";

const tagsState = useTagsState()

onMounted(async () => {
    await tagsState.search()
})

const showSlugField = ref<boolean>(false)

tagsState.$subscribe(debounce<SubscriptionCallback>(async (state) => {
    if (state.events?.key === 'name') {
        if (state.events?.oldValue !== state.events?.newValue) {
            await tagsState.search(state.events?.newValue, true)
        }
    }
}), {detached: true, deep: true})

function handleEdit(tag: TagType) {
    tagsState.item.id = tag.id
    tagsState.item.name = tag.name
    tagsState.item.slug = tag.slug
}

async function handleDelete(tagId: number) {
    await tagsState.remove(tagId)
}

async function handleSave() {
    await tagsState.save()
}

</script>

<template>
    <PageHeader class="mb-3">Tags ({{ tagsState.item.id ? 'edit' : 'create' }})</PageHeader>
    <div class="flex flex-col gap-2 items-stretch mb-3">
        <div>
            <FormLabel for="tag-search" class="text-sm">Name</FormLabel>
            <FormField v-model.trim="tagsState.item.name"
                       :disabled="tagsState.status.tagSaving"
                       id="tag-search"
                       placeholder="Search"/>
        </div>

        <div v-if="showSlugField">
            <FormLabel for="tag-slug" class="text-sm">Slug</FormLabel>
            <FormField v-model.trim="tagsState.item.slug"
                       :disabled="tagsState.status.tagSaving"
                       id="tag-slug"
                       placeholder="Slug"/>
        </div>
        <div class="flex justify-end gap-2">
            <Btn :type="Colors.dark" class="text-sm mr-auto"
                 @click="showSlugField = !showSlugField">
                <ChevronUpIcon class="size-4" v-if="showSlugField"/>
                <ChevronDownIcon class="size-4" v-if="!showSlugField"/>
                Slug
            </Btn>
            <Btn :type="Colors.danger" class="text-sm"
                 @click="tagsState.item.id = null; tagsState.item.name = ''; tagsState.item.slug = ''">
                <XMarkIcon class="size-4"/>
                Clean
            </Btn>
            <Btn :type="Colors.primary" class="text-sm"
                 @click="handleSave()">
                <ArrowDownOnSquareIcon class="size-4"/>
                Save
            </Btn>
        </div>
    </div>
    <div class="flex flex-wrap gap-2">
        <div class="bg-stone-800 border border-stone-700 rounded-md p-3 flex gap-4" v-for="tag in tagsState.items">
            <div>
                <h4 class="text-white"><Tag :type="Colors.dark">ID: {{ tag.id }}</Tag> {{ tag.name}}</h4>
                <div class="text-sm text-gray-300">{{ tag.slug }}</div>
            </div>

            <div class="flex flex-nowrap gap-1 justify-end">
                <div>
                    <Btn :type="Colors.primary"
                         @click="handleEdit(tag)">
                        <PencilSquareIcon class="size-3"/>
                    </Btn>
                </div>
                <div>
                    <Btn :type="Colors.danger"
                         :disabled="tagsState.status.tagDeleting.includes(tag.id)"
                         @click="handleDelete(tag.id)">
                        <TrashIcon class="size-3" />
                    </Btn>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped lang="scss">

</style>
