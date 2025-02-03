<script setup lang="ts">
import {onMounted, onUnmounted} from "vue";
//
import usePostListState from "../../states/posts";
//
import PageHeader from "../molecules/PageHeader.vue";
import BtnLink from "../atoms/BtnLink.vue";
import Btn from "../atoms/Btn.vue";
import PostListItem from "../organisms/Post/PostListItem.vue";
import Pagination from "../molecules/Pagination.vue";
import {useRouter} from "vue-router";
import RouteNames from "../../domain/enums/RouteNames";
import FloatingPanel from "../molecules/FloatingPanel.vue";
import Backdrop from "../atoms/Backdrop.vue";
import LoadingPlaceholder from "../atoms/LoadingPlaceholder.vue";
import NothingFound from "../atoms/NothingFound.vue";
import usePostState from "../../states/post";

const postState = usePostState()
const state = usePostListState()
const router = useRouter()

async function paginate(page: number) {
    await router.push({name: RouteNames.POST_LIST_PAGE, params: {page}})
    await state.paginate(page)
}

onMounted(async () => {
    await state.paginate()
})

onUnmounted(() => {
    state.$reset()
})

</script>

<template>
    <FloatingPanel class="flex items-center my-3 justify-between sticky top-1 z-10">
        <BtnLink icon="PlusIcon" type="light" :to="{name: RouteNames.POST_CREATE}">Add</BtnLink>
        <Pagination :links="state.pagination"
                    @click:next="paginate"
                    @click:prev="paginate"/>
    </FloatingPanel>
    <PageHeader>Posts</PageHeader>
    <Backdrop class="bg-neutral-100 dark:bg-zinc-800 p-3 rounded-md">

        <LoadingPlaceholder class="" v-if="state.status.listLoading"/>
        <NothingFound class="" v-else-if="state.items.length === 0"/>
        <PostListItem v-else
                      :cached-post-id="postState.id"
                      v-for="post in state.items"
                      :key="`post-${post.id}`"
                      :post-id="post.id"
                      :published-at="post.published_at"
                      :tags="post.tags"
                      :title="post.title"
                      :is-draft="post?.is_draft"
                      :preview="post?.previewImage?.path"
                      :description="post.preview" />
    </Backdrop>
</template>

<style scoped lang="scss">

</style>
