<script setup lang="ts">

import {computed, onMounted, onBeforeUnmount, ref} from "vue";
import {useRoute, useRouter} from "vue-router";
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
import {blocks} from "../../types/blocks";

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

enum Tabs {
    main = 'main',
    content = 'content',
}

const currentTab = ref<Tabs>(Tabs.main)

const checkTab = computed(() => ({
    isMain: currentTab.value === Tabs.main,
    isContent: currentTab.value === Tabs.content,
}))

function selectTab(value: Tabs) {
    currentTab.value = value
}

</script>

<template>
    <PageButtons class="mb-3 px-3">
        <AddBlock v-if="checkTab.isContent" :list="blocks" @add:block="postState.blockAdd"/>
    </PageButtons>

    <PageHeader class="mb-3 mt-6 flex items-start gap-3 px-3">
        <PostPreview />
        <div class="flex flex-col w-full justify-start">
            <div v-if="postState?.item?.id > 0"><Tag class="blog text-3xl text-nowrap" type="dark">ID: {{ postId }}</Tag></div>
            <div v-else><Tag class="blog text-3xl text-nowrap" type="dark">Post:</Tag></div>
            <span>{{ postState.item.title }}</span>
        </div>
    </PageHeader>

    <TabGroup class="mb-3 mx-3">
        <TabLabel :active="checkTab.isMain" @select="selectTab(Tabs.main)">Main</TabLabel>
        <TabLabel :active="checkTab.isContent" @select="selectTab(Tabs.content)">Content</TabLabel>
    </TabGroup>

    <PostMainForm v-show="checkTab.isMain"
                  role="tabpanel"
                  class="px-3"
                  tabindex="0" />

    <PostContentForm v-show="checkTab.isContent"
                     role="tabpanel"
                     class="px-3"
                     tabindex="1" />

    <FilesModal type="images" @file:click="postState.item.previewImage = $event; postState.item.preview_image_id = $event.hash"/>
</template>
