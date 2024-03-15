<script setup lang="ts">

import {onMounted, ref, watch} from "vue";
import {ChevronUpIcon, ChevronDownIcon, XMarkIcon, ArrowDownOnSquareIcon, TrashIcon, PencilSquareIcon} from "@heroicons/vue/20/solid";
//
import type {Tag as TagType} from "../../types/data";
import {Colors} from "../../types/colors";
//
import useTagsState from "../../states/tags";
import useNotificationState from "../../states/notfications";
//
import debounce from "../../utils/debounce";
import * as tags from "../../api/tags";
//
import Tag from "../../components/atoms/Tag.vue";
import PageHeader from "../../components/molecules/PageHeader.vue";
import Btn from "../../components/atoms/Btn.vue";

import FormField from "../../components/atoms/Form/FormField.vue";
import FormLabel from "../../components/atoms/Form/FormLabel.vue";

const tagsState = useTagsState()
const notificationState = useNotificationState()

onMounted(async () => {
    await tagsState.search()
})

const tagId = ref<number|null>(null)
const tagName = ref<string>('')
const tagSlug = ref<string>('')
const showSlugField = ref<boolean>(false)
const tagSaving = ref<boolean>(false)
const tagDeleting = ref<number[]>([])

watch(tagName, debounce(async (value: string, oldValue: string) => {
    if (oldValue !== value) {
        await tagsState.search(value)
    }
}, 300))

async function handleDelete(tagId: number) {
    tagDeleting.value = [...tagDeleting.value, tagId]

    try {
        await tags.removeById(tagId)
        await tagsState.search(tagName.value)
    } catch (e) {
        notificationState.pushError(e as Error)
    } finally {
        tagDeleting.value = tagDeleting.value.filter(id => id !== tagId)
    }
}

function handleEdit(tag: TagType) {
    tagId.value = tag.id
    tagName.value = tag.name
    tagSlug.value = tag.slug
}

async function handleSave() {
    tagSaving.value = true
    try {
        if (tagId.value) {
            await tags.update(tagId.value, {
                name: tagName.value,
                slug: tagSlug.value,
            })
        } else {
            const {data} = await tags.create({
                name: tagName.value,
                slug: tagSlug.value,
            })

            tagId.value = data.id
        }

        await tagsState.search(tagName.value, true)
    } catch (e) {
        notificationState.pushError(e as Error)
    } finally {
        tagSaving.value = false
    }
}

</script>

<template>
    <PageHeader class="mb-3">Tags ({{ tagId ? 'edit' : 'create' }})</PageHeader>
    <div class="flex flex-col gap-2 items-stretch mb-3">
        <div>
            <FormLabel for="tag-search" class="text-sm">Name</FormLabel>
            <FormField v-model.trim="tagName"
                       :disabled="tagSaving"
                       id="tag-search"
                       placeholder="Search"/>
        </div>

        <div v-if="showSlugField">
            <FormLabel for="tag-slug" class="text-sm">Slug</FormLabel>
            <FormField v-model.trim="tagSlug"
                       :disabled="tagSaving"
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
                 @click="tagId = null; tagName = ''; tagSlug = ''">
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
                         :disabled="tagDeleting.includes(tag.id)"
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
