<script setup lang="ts">

import {computed, defineProps, ref} from "vue";
import {TrashIcon, PhotoIcon} from "@heroicons/vue/20/solid";
//
import type {Post, File, Tag as TagData} from "../../types/data";
//
import useImagesState from "../../states/images";
import useTagsState from "../../states/tags";
import debounce from "../../utils/debounce";
import {ValidationErrors} from "../../types/api";
//
import dayjs from "dayjs";
//
import Editor from "../../components/organisms/Editor.vue";
import MultiSelect from "../../components/atoms/MultiSelect.vue";
import Error from "../../components/atoms/Error.vue";
import TabLabel from "../../components/atoms/Tabs/TabLabel.vue";
import FormField from "../../components/atoms/Form/FormField.vue";
import FormLabel from "../../components/atoms/Form/FormLabel.vue";
import TabGroup from "../../components/atoms/Tabs/TabGroup.vue";
import Btn from "../../components/atoms/Btn.vue";
import FilesModal from "../../components/organisms/FilesModal.vue";
import CheckboxButton from "../../components/atoms/CheckboxButton.vue";
import FormCheckbox from "../../components/atoms/Form/FormCheckbox.vue";

enum Tabs {
    main = 'main',
    preview = 'preview',
    content = 'content',
}

const tagsMapperFn = (v: any) => ({value: v.id, text: v.name})

interface Props {
    post: Post
    errors: ValidationErrors
    suspend?: boolean
    tags: TagData[]
    previewImages: File[]
    previewTypes: {value: string, text: string}[]
}

defineProps<Props>()

const tagsState = useTagsState()
const imagesState = useImagesState()

const currentTab=ref<Tabs>(Tabs.main)

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

const openModal = ref(false)
</script>

<template>
    <TabGroup>
        <TabLabel :active="checkTab.isMain" @select="selectTab(Tabs.main)">Main</TabLabel>
        <TabLabel :active="checkTab.isPreview" @select="selectTab(Tabs.preview)">Preview</TabLabel>
        <TabLabel :active="checkTab.isContent" @select="selectTab(Tabs.content)">Content</TabLabel>
    </TabGroup>

    <div v-if="checkTab.isMain"
         role="tabpanel"
         aria-labelledby="pills-main-tab"
         tabindex="0">

        <div class="mb-3">
            <FormLabel for="post-title">Title</FormLabel>
            <FormField placeholder="Title"
                       id="post-title"
                       type="text"
                       name="title"
                       :failed="errors.hasOwnProperty('title')"
                       :value="post.title"
                       @input="post.title = $event?.target?.value"/>
            <Error name="title" :errors="errors"/>
        </div>

        <div class="mb-3">
            <FormLabel for="post-published-at">Published At (UTC)</FormLabel>
            <FormField placeholder="Published At"
                       id="post-published-at"
                       :failed="errors.hasOwnProperty('published_at')"
                       type="text"
                       name="published_at"
                       :value="post?.published_at || dayjs().format('YYYY-MM-DD HH:mm')"
                       @input="post.published_at = $event?.target?.value"/>
            <Error name="published_at" :errors="errors"/>
        </div>

        <div class="mb-3">
            <FormCheckbox id="post-is-draft"
                          name="is_draft"
                          v-model="post.is_draft">Draft</FormCheckbox>
<!--            <div class="flex gap-1 items-end">-->
<!--                <input class="block"-->
<!--                       name="is_draft"-->
<!--                       type="checkbox"-->
<!--                       :class="{'is-invalid': errors.hasOwnProperty('is_draft')}"-->
<!--                       id="post-is-draft"-->
<!--                       v-model="post.is_draft">-->
<!--                <FormLabel for="post-is-draft">Draft</FormLabel>-->
<!--            </div>-->
            <Error name="is_draft" :errors="errors"/>
        </div>

        <div class="mb-3">
            <FormLabel>Tags</FormLabel>
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
            <Error name="tags" :errors="errors"/>
        </div>
    </div>
    <div v-if="checkTab.isPreview"
         role="tabpanel"
         aria-labelledby="pills-preview-tab"
         tabindex="0">
        <div class="mb-3" v-if="post?.previewImage">
            <div class="flex flex-wrap gap-4">
                <div>
                    <div class="size-64 border-2 rounded-md overflow-hidden bg-no-repeat bg-clip-border bg-cover bg-center"
                         :style="`background-image: url('${post?.previewImage?.path}')`">
                    </div>
                </div>
                <div>
                    <div class="flex flex-col items-stretch gap-2">
                        <CheckboxButton v-for="previewType in previewTypes"
                                        @click="post.preview_image_type = previewType.value"
                                        :is-checked="post.preview_image_type === previewType.value">
                            {{ previewType.text }}
                        </CheckboxButton>
                        <button class="flex gap-1 justify-center items-center border border-red-400 rounded-md p-3 text-white duration-300 bg-red-500"
                                @click="post.preview_image_id = null; post.preview_image_type = null; post.previewImage = null">
                            <TrashIcon class="size-5"/>
                            <span>Remove</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <Btn type="primary" @click="openModal = true" class="flex gap-2">
                <PhotoIcon class="size-5"/>
                Set Preview
            </Btn>
            <FilesModal type="images"
                        :is-open="openModal"
                        :list="imagesState.items"
                        @file:click="post.previewImage = $event; openModal = false; post.preview_image_id = $event.hash"
                        @modal:close="openModal = false"/>
        </div>

        <div class="mb-3">
            <Editor id="post-introduction"
                    v-model="post.preview"
                    :class="{'is-invalid': errors.hasOwnProperty('preview')}"
                    :initial-value="post.preview"/>
            <Error name="preview" :errors="errors"/>
        </div>

    </div>
    <div v-if="checkTab.isContent"
         role="tabpanel"
         aria-labelledby="pills-content-tab"
         tabindex="0">
        <div class="mb-3">
            <Editor id="post-content"
                    v-model="post.content"
                    :class="{'is-invalid': errors.hasOwnProperty('content')}"
                    :initial-value="post.content"/>
            <Error name="content" :errors="errors"/>
        </div>
    </div>
</template>

<style scoped lang="scss">
</style>
