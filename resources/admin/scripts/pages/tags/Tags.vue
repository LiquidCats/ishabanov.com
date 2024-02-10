<script setup lang="ts">

import {onMounted, ref, watch} from "vue";
import Tag from "../../components/atoms/Tag.vue";
import PageHeader from "../../components/molecules/PageHeader.vue";
import Btn from "../../components/atoms/Btn.vue";

import useTagsState from "../../states/tags";
import {Colors} from "../../types/colors";
import type {Tag as TagType} from "../../types/data";
import debounce from "../../utils/debounce";
import * as tags from "../../api/tags";
import useNotificationState from "../../states/notfications";

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
    <PageHeader>Tags ({{ tagId ? 'edit' : 'create' }})</PageHeader>
    <div class="d-flex flex-column flex-grow-1 gap-2 align-items-start mb-3">
        <div class="form-floating w-100">
            <input type="text"
                   class="form-control"
                   id="tag-search"
                   placeholder="search"
                   v-model.trim="tagName"
                   :disabled="tagSaving">
            <label for="tag-search">Name</label>
        </div>
        <div v-if="showSlugField" class="form-floating w-100">
            <input type="text"
                   class="form-control"
                   id="tag-search"
                   placeholder="search"
                   v-model.trim="tagSlug">
            <label for="tag-search">Slug</label>
        </div>
        <div class="d-flex justify-content-end gap-2 w-100">
            <Btn :type="Colors.secondary"
                 :icon="showSlugField ? 'chevron-up' : 'chevron-down'"
                 @click="showSlugField = !showSlugField"
                 class="btn-sm">Slug</Btn>
            <Btn :type="Colors.danger"
                 icon="x"
                 @click="tagId = null; tagName = ''; tagSlug = ''"
                 class="btn-sm">clean</Btn>
            <Btn :type="Colors.primary"
                 icon="floppy"
                 @click="handleSave()"
                 class="btn-sm">Save</Btn>
        </div>
    </div>
    <div class="d-flex flex-wrap gap-2">
        <div class="p-3 border border-1 border-light-subtle rounded-3 d-flex gap-4" v-for="tag in tagsState.items">
            <div>
                <h4><Tag :type="Colors.dark">ID: {{ tag.id }}</Tag> {{ tag.name}}</h4>
                <div class="small text-muted">{{ tag.slug }}</div>
            </div>

            <div class="d-flex flex-nowrap gap-1 justify-content-end">
                <div><Btn :type="Colors.primary"
                          icon="pencil-square"
                          class="btn-sm"
                          @click="handleEdit(tag)"/></div>
                <div><Btn :type="Colors.danger"
                          icon="trash"
                          :class="{'disabled': tagDeleting.includes(tag.id)}"
                          :disabled="tagDeleting.includes(tag.id)"
                          class="btn-sm" @click="handleDelete(tag.id)"/></div>
            </div>
        </div>
    </div>
</template>

<style scoped lang="scss">

</style>
