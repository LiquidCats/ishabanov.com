<script setup lang="ts">

import {onMounted, ref} from "vue";
import {ChevronUpIcon, ChevronDownIcon} from "@heroicons/vue/24/outline";
import {TagResource} from "../../../kernel/types/api";
//
import {Colors} from "../../domain/types/colors";
//
import useTagsState from "../../states/tags";
//
import debounce from "../../utils/debounce";
//
import Tag from "../atoms/Tag.vue";
import PageHeader from "../molecules/PageHeader.vue";
import Btn from "../atoms/Btn.vue";

import FormField from "../atoms/Form/FormField.vue";
import FormLabel from "../atoms/Form/FormLabel.vue";
import {SubscriptionCallback} from "pinia";
import Backdrop from "../atoms/Backdrop.vue";
import LoadingPlaceholder from "../atoms/LoadingPlaceholder.vue";
import NothingFound from "../atoms/NothingFound.vue";
import Paper from "../atoms/Paper.vue";
import DeleteButton from "../molecules/Buttons/DeleteButton.vue";

const tagsState = useTagsState()

onMounted(async () => {
    await tagsState.search()
})

const showSlugField = ref<boolean>(false)

tagsState.$subscribe(debounce<SubscriptionCallback<any>>(async (state: any) => {
    if (state.events?.key === 'name') {
        if (state.events?.oldValue !== state.events?.newValue) {
            await tagsState.search(state.events?.newValue, true)
        }
    }
}, 10), {detached: true, deep: true})

function handleEdit(tag: TagResource) {
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
    <PageHeader class="mt-3">Tags ({{ tagsState.item.id ? 'edit' : 'create' }})</PageHeader>
    <Backdrop class="flex flex-col gap-2 items-stretch mb-3">
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
            <Btn :icon="showSlugField ? 'ChevronUpIcon': 'ChevronDownIcon'" type="dark"
                 @click="showSlugField = !showSlugField">
                Slug
            </Btn>
            <Btn icon="XMarkIcon" type="danger"
                 @click="tagsState.item.id = null; tagsState.item.name = ''; tagsState.item.slug = ''">
                Clean
            </Btn>
            <Btn icon="ArrowDownOnSquareIcon" type="primary" class="text-sm"
                 @click="handleSave()">
                Save
            </Btn>
        </div>
    </Backdrop>
    <Backdrop class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2">
        <LoadingPlaceholder class="md:col-span-2" v-if="tagsState.status.tagsLoading" />
        <NothingFound class="md:col-span-2" v-else-if="tagsState.items.length === 0"/>
        <Paper class="flex gap-3" v-for="tag in tagsState.items">

            <div><Tag :type="Colors.dark">ID: {{ tag.id }}</Tag></div>
            <div>
                <h2 class="dark:text-gray-50 m-0 text-base line-clamp-1">Name: {{ tag.name}}</h2>
                <small class="text-xs dark:text-gray-300 m-0 line-clamp-1">Slug: {{ tag.slug }}</small>
            </div>

            <div class="flex gap-1 ml-auto">
                <Btn icon="PencilSquareIcon" type="primary" @click="handleEdit(tag)"/>
                <DeleteButton
                    :disabled="tagsState.status.tagDeleting.includes(tag.id)"
                    @click="handleDelete(tag.id)" />
            </div>
        </Paper>
    </Backdrop>
</template>

<style scoped lang="scss">

</style>
