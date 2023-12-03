<script setup lang="ts">

import {computed, defineProps, ref} from "vue";
//
import type {Post, File, Tag as TagData} from "../../types/data";
//
import Editor from "../../components/organisms/Editor.vue";
import MultiSelect from "../../components/atoms/MultiSelect.vue";
import dayjs from "dayjs";
import useTagsState from "../../states/tags";
import debounce from "../../utils/debounce";

enum Tabs {
    main = 'main',
    preview = 'preview',
    content = 'content',
}

const tagsMapperFn = (v: any) => ({value: v.id, text: v.name})

interface Props {
    post: Post
    suspend?: boolean
    tags: TagData[]
    previewImages: File[]
    previewTypes: {value: string, text: string}[]
}

defineProps<Props>()

const tagsState = useTagsState()

const currentTab= ref<Tabs>(Tabs.main)

const checkTab = computed(() => ({
    isMain: currentTab.value === Tabs.main,
    isPreview: currentTab.value === Tabs.preview,
    isContent: currentTab.value === Tabs.content,
}))

function selectTab(value: Tabs) {
    currentTab.value = value
}

async function handleTagSearch(e: Event) {
    const searchString: string = e?.target?.value ?? '';

    await tagsState.search(searchString)
}
const debouncedHandleTagSearch = debounce(handleTagSearch, 300)

</script>

<template>
    <ul class="nav nav-pills mb-3" id="post-form-tabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link"
                    :class="{'active': checkTab.isMain}"
                    type="button"
                    role="tab"
                    id="pills-main-tab"
                    aria-controls="pills-main"
                    :aria-selected="checkTab.isMain ? 'true' : 'false'"
                    @click="selectTab(Tabs.main)">Main</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link"
                    :class="{'active': checkTab.isPreview}"
                    type="button"
                    role="tab"
                    id="pills-preview-tab"
                    aria-controls="pills-preview"
                    :aria-selected="checkTab.isPreview ? 'true' : 'false'"
                    @click="selectTab(Tabs.preview)">Preview</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link"
                    :class="{'active': checkTab.isContent}"
                    type="button"
                    role="tab"
                    id="pills-content-tab"
                    aria-controls="pills-content"
                    :aria-selected="checkTab.isContent ? 'true' : 'false'"
                    @click="selectTab(Tabs.content)">Content</button>
        </li>
    </ul>

    <div v-if="checkTab.isMain"
         class="tab-pane show"
         role="tabpanel"
         aria-labelledby="pills-main-tab"
         tabindex="0">

        <div class="mb-3">
            <label for="post-title" class="form-label">Title</label>
            <input type="text"
                   name="title"
                   class="form-control"
                   id="post-title"
                   :value="post.title"
                   @input="post.title = $event?.target?.value"
                   placeholder="Title">
        </div>

        <div class="mb-3">
            <label for="post-published-at" class="form-label">Published At (UTC)</label>
            <input name="published_at"
                   class="form-control"
                   :value="post?.published_at || dayjs().format('YYYY-MM-DD HH:mm')"
                   @input="post.published_at = $event?.target?.value"
                   id="post-published-at" placeholder="Published At"/>
        </div>

        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input"
                       name="is_draft"
                       type="checkbox"
                       id="post-is-draft"
                       v-model="post.is_draft">
                <label class="form-check-label" for="post-is-draft">Draft</label>
            </div>
        </div>

        <div class="mb-3">
            <div class="mb-2">Tags</div>
                <MultiSelect :items="tags"
                             @input="debouncedHandleTagSearch($event)"
                             :mapper="tagsMapperFn"
                             v-model="post.tags">
<!--                    <template #nothing>-->
<!--                        <div class="d-flex justify-content-center mb-2">-->
<!--                            <span>Nothing Found</span>-->
<!--                        </div>-->
<!--                        <Btn type="primary" class="btn-sm"><i class="bi bi-plus-lg"></i> Create</Btn>-->
<!--                    </template>-->
                </MultiSelect>
        </div>
    </div>
    <div v-if="checkTab.isPreview"
         class="tab-pane show"
         role="tabpanel"
         aria-labelledby="pills-preview-tab"
         tabindex="0">
        <div class="mb-3">
            <div class="mb-3 fw-bold">Preview Image</div>
            <div class="d-flex flex-wrap gap-2">
                <div style="height: 100px;width: 100px; cursor: pointer"
                     class="d-flex justify-content-center align-items-center border border-3 rounded-3"
                     :class="{'border-dark-subtle': post.preview_image_id !== null, 'border-primary': post.preview_image_id === null}"
                     @click="post.preview_image_id = null; post.preview_image_type = null">
                    none
                </div>

                <div style="max-height: 100px;max-width: 100px; cursor: pointer"
                     class="d-flex flex-column border border-3 rounded-3"
                     :class="{'border-dark-subtle': post.preview_image_id !== previewImage.hash, 'border-primary': post.preview_image_id === previewImage.hash}"
                     v-for="previewImage in previewImages"
                     @click="post.preview_image_id = previewImage.hash">
                    <div>
                        <img class="d-block img-thumbnail" :src="previewImage.path" :alt="previewImage.name">
                    </div>

                    <div class="text-truncate">{{ previewImage.name }}</div>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <div class="mb-3 fw-bold">Preview Type</div>
            <div class="d-flex flex-wrap gap-2">
                <div style="cursor: pointer"
                     class="d-flex justify-content-center align-items-center border border-3 rounded-3 p-3"
                     :class="{'border-dark-subtle': post.preview_image_type !== null, 'border-primary': post.preview_image_type === null}"
                     @click="post.preview_image_id = null; post.preview_image_type = null">
                    none
                </div>

                <div style="cursor: pointer"
                     class="d-flex flex-column border border-3 rounded-3 p-3"
                     :class="{'border-dark-subtle': post.preview_image_type !== previewType.value, 'border-primary': post.preview_image_type === previewType.value}"
                     v-for="previewType in previewTypes"
                     @click="post.preview_image_type = previewType.value">
                    {{ previewType.text }}
                </div>
            </div>
        </div>

        <hr>

        <div class="mb-3">
            <Editor id="post-introduction" v-model:model-value="post.preview" :initial-value="post.preview"/>
        </div>
    </div>
    <div v-if="checkTab.isContent"
         class="tab-pane show"
         role="tabpanel"
         aria-labelledby="pills-content-tab"
         tabindex="0">
        <div class="mb-3">
            <Editor id="post-content" v-model="post.content" :initial-value="post.content"/>
        </div>
    </div>
</template>

<style scoped>

</style>
