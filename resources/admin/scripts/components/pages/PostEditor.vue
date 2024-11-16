<script setup lang="ts">

import {onMounted, onBeforeUnmount, ref} from "vue";
import {useRoute} from "vue-router";
//
import PageButtons from "../organisms/Post/PageButtons.vue";
import FilesModal from "../organisms/FilesModal.vue";
import PostMainForm from "../organisms/Post/PostMainForm.vue";
import TabGroup from "../atoms/Tabs/TabGroup.vue";
import TabLabel from "../atoms/Tabs/TabLabel.vue";
import PostContentForm from "../organisms/Post/PostContentForm.vue";
import AddBlock from "../molecules/Editor/AddBlock.vue";
import TabPanel from "../atoms/Tabs/TabPanel.vue";
import PostTitle from "../organisms/Post/PostTitle.vue";
//
import usePostState from "../../states/post";
import useImagesState from "../../states/images";
import useTagsState from "../../states/tags";
import useModalsState from "../../states/modals";
import {blockPreviews} from "../../utils/blocks/getters";


const postState = usePostState()
const imagesState = useImagesState()
const tagsState = useTagsState()
const modalsState = useModalsState()

const route = useRoute()

const postId: number = parseInt(route?.params?.post_id?.toString())

onMounted(async () => {
    await tagsState.search()
    await imagesState.load()

    if (postState.id !== postId) {
        await postState.load(postId)
    }
})

const selectedTab = ref<string>('main')

</script>

<template>
    <PageButtons v-slot="pageButtonsProps">
        <AddBlock v-if="selectedTab === 'content'"
                  :disabled="pageButtonsProps.disabled"
                  :list="blockPreviews"
                  :last-index="postState?.item?.blocks?.length"
                  @add:block="postState.blockAdd"/>
    </PageButtons>

    <PostTitle :title="postState.item.title"
               :post-id="postState?.item?.id"
               :preview-path="postState?.item?.previewImage?.path || null"
               :preview-type="postState?.item?.preview_image_type || null"
               :has-preview="postState.hasPreview"
               @click:preview-image="modalsState.open('images')"
               @click:preview-remove="postState.previewRemove"
               @click:preview-type="postState.item.preview_image_type = $event"/>

    <TabGroup selected="main" @select:tab="selectedTab = $event">
        <template #labels>
            <TabLabel name="main">Main</TabLabel>
            <TabLabel name="content">Content</TabLabel>
        </template>
        <template #panels>
            <TabPanel for="main" tabindex="0">
                <PostMainForm/>
            </TabPanel>
            <TabPanel for="content" tabindex="1">
                <PostContentForm/>
            </TabPanel>
        </template>
    </TabGroup>

    <FilesModal type="images" @file:click="postState.previewAdd"/>
</template>
