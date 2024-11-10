<script setup lang="ts">

import {onMounted, onBeforeUnmount, ref} from "vue";
import {useRoute} from "vue-router";
//
import PageHeader from "../../components/molecules/PageHeader.vue";
import Tag from "../../components/atoms/Tag.vue";
//
import usePostState from "../../states/post";
import useImagesState from "../../states/images";
import useTagsState from "../../states/tags";
import RouteNames from "../../enums/RouteNames";
import PageButtons from "./PageButtons.vue";
import FilesModal from "../../components/organisms/FilesModal.vue";
import PostPreview from "./PostPreview.vue";
import PostMainForm from "./PostMainForm.vue";
import TabGroup from "../../components/atoms/Tabs/TabGroup.vue";
import TabLabel from "../../components/atoms/Tabs/TabLabel.vue";
import PostContentForm from "./PostContentForm.vue";
import AddBlock from "../../components/molecules/Editor/AddBlock.vue";
import {blockPreviews} from "../../types/blocks";
import TabPanel from "../../components/atoms/Tabs/TabPanel.vue";

const postState = usePostState()
const imagesState = useImagesState()
const tagsState = useTagsState()

const route = useRoute()

const postId: number = parseInt(route?.params?.post_id?.toString())

onMounted(async () => {
    await tagsState.search()
    await imagesState.load()
    if (route.name === RouteNames.POST_EDIT) {
        await postState.load(postId)
    }
})

onBeforeUnmount(() => {
    postState.$reset()
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

    <PageHeader class="mb-3 mt-6 mx-3 flex items-start gap-3 ">
        <PostPreview />
        <div class="flex flex-col w-full justify-start gap-0.5">
            <div v-if="postState?.item?.id > 0"><Tag class="blog text-3xl text-nowrap" type="dark">ID: {{ postId }}</Tag></div>
            <div v-else><Tag class="blog text-3xl text-nowrap" type="dark">Post:</Tag></div>
            <span>{{ postState.item.title }}</span>
        </div>
    </PageHeader>

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
