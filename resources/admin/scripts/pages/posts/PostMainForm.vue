<script setup lang="ts">

import dayjs from "dayjs";
import Error from "../../components/atoms/Error.vue";
import FormText from "../../components/atoms/Form/FormText.vue";
import FormLabel from "../../components/atoms/Form/FormLabel.vue";
import FormField from "../../components/atoms/Form/FormField.vue";
import FormCheckbox from "../../components/atoms/Form/FormCheckbox.vue";
import MultiSelect from "../../components/atoms/MultiSelect.vue";
import usePostState from "../../states/post";
import useTagsState from "../../states/tags";
import debounce from "../../utils/debounce";

const postState = usePostState()
const tagsState = useTagsState()

const tagsMapperFn = (v: any) => ({value: v.id, text: v.name})

async function handleTagSearch(e: Event) {
    const searchString: string = e?.target?.value ?? '';

    await tagsState.search(searchString)
}

const debouncedHandleTagSearch = debounce(handleTagSearch, 300)

</script>

<template>
    <div>
        <div class="mb-3">
            <FormLabel for="post-title" class="mb-1">Title</FormLabel>
            <FormField placeholder="Title"
                       id="post-title"
                       type="text"
                       name="title"
                       :failed="postState.errors.hasOwnProperty('title')"
                       :value="postState.item.title"
                       @input="postState.item.title = $event?.target?.value"/>
            <Error name="title" :errors="postState.errors"/>
        </div>

        <div class="mb-3">
            <FormLabel class="mb-1">Tags</FormLabel>
            <MultiSelect :items="tagsState.items"
                         @input="debouncedHandleTagSearch($event)"
                         :mapper="tagsMapperFn"
                         v-model="postState.item.tags">
                <!--                    <template #nothing>-->
                <!--                        <div class="d-flex justify-content-center mb-2">-->
                <!--                            <span>Nothing Found</span>-->
                <!--                        </div>-->
                <!--                        <Btn type="primary" class="btn-sm"><i class="bi bi-plus-lg"></i> Create</Btn>-->
                <!--                    </template>-->
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
                           :value="postState.item?.published_at || dayjs().format('YYYY-MM-DD HH:mm')"
                           @input="postState.item.published_at = $event?.target?.value"/>

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
    </div>
</template>

<style scoped lang="scss">

</style>
