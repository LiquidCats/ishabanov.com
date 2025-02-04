<script setup lang="ts">

import dayjs from "dayjs";
import Error from "../../atoms/Error.vue";
import FormText from "../../atoms/Form/FormText.vue";
import FormLabel from "../../atoms/Form/FormLabel.vue";
import FormField from "../../atoms/Form/FormField.vue";
import FormCheckbox from "../../atoms/Form/FormCheckbox.vue";
import MultiSelect from "../../atoms/MultiSelect.vue";
import usePostState from "../../../states/post";
import useTagsState from "../../../states/tags";
import debounce from "../../../utils/debounce";
import Btn from "../../atoms/Btn.vue";

const postState = usePostState()
const tagsState = useTagsState()

async function handleTagSearch(e: Event) {
    const searchString: string = e?.target?.value ?? '';

    await tagsState.search(searchString)
}

async function handleTagFastSave() {
    await tagsState.fastSave()
    const last = tagsState.items.at(-1)
    postState.item.tags = [...postState.item.tags, last]
}

const debouncedHandleTagSearch = debounce(handleTagSearch, 300)

</script>

<template>
    <div class="mb-3">
        <FormLabel for="post-title" class="mb-1">Title</FormLabel>
        <FormField placeholder="Title"
                   id="post-title"
                   type="text"
                   name="title"
                   :failed="postState.errors.hasOwnProperty('title')"
                   v-model="postState.item.title"/>
        <Error name="title" :errors="postState.errors"/>
    </div>

    <div class="mb-3">
        <FormLabel class="mb-1">Tags</FormLabel>
        <MultiSelect :items="tagsState.items"
                     value-key="id"
                     text-key="name"
                     @input="debouncedHandleTagSearch($event)"
                     v-model="postState.item.tags">
            <template #nothing>
                <div class="flex flex-col justify-center gap-1.5 mb-2">
                    <div>Nothing Found</div>
                    <div>
                        <Btn @click="handleTagFastSave" type="primary" class="mx-auto !py-1 !text-sm">Create</Btn>
                    </div>
                </div>
            </template>
        </MultiSelect>
        <Error name="tags" :errors="postState.errors"/>
    </div>

    <div class="mb-3">
        <FormLabel for="post-published-at" class="mb-1">Published At (UTC)</FormLabel>
        <div class="flex gap-2">
            <FormCheckbox id="post-is-draft"
                          name="is_draft"
                          v-model="postState.item.is_draft">Draft</FormCheckbox>
            <FormField placeholder="Published At"
                       id="post-published-at"
                       :failed="postState.errors.hasOwnProperty('published_at')"
                       type="text"
                       name="published_at"
                       v-model="postState.item.published_at"/>
        </div>


        <Error name="is_draft" :errors="postState.errors"/>
        <Error name="published_at" :errors="postState.errors"/>
    </div>

    <div class="mb-3">
        <FormLabel for="post-preview" class="mb-1">Preview</FormLabel>
        <FormText v-model="postState.item.preview"
                  id="post-preview"
                  class="h-80"
                  :failed="postState.errors.hasOwnProperty('title')" placeholder="Preview Text"/>
        <Error name="preview" :errors="postState.errors"/>
    </div>
</template>

<style scoped lang="scss">

</style>
