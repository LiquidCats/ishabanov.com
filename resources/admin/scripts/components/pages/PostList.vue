<script setup lang="ts">
import {onMounted, onUnmounted} from "vue";
import {PlusIcon, TrashIcon, EyeIcon, EyeSlashIcon} from "@heroicons/vue/20/solid";
//
import usePostListState from "../../states/posts";
//
import PageHeader from "../molecules/PageHeader.vue";
import BtnLink from "../atoms/BtnLink.vue";
import Btn from "../atoms/Btn.vue";
import PostListItem from "../molecules/Post/PostListItem.vue";
import {Colors} from "../../types/colors";
import Pagination from "../molecules/Pagination.vue";
import {useRouter} from "vue-router";
import RouteNames from "../../enums/RouteNames";
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
        <BtnLink type="light" :to="{name: RouteNames.POST_CREATE}">
            <PlusIcon class="size-5"/>Add
        </BtnLink>
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
                      :preview="post?.previewImage?.path"
                      :description="post.preview">
            <Btn size="small"
                 :type="post.is_draft ? Colors.success : Colors.warning"
                 @click="state.changeState(post.id)"
                 :disabled="state.status.changingStateId === post.id">
                <component :is="post.is_draft ? EyeIcon : EyeSlashIcon" class="size-6 md:size-3" />
                <span class="hidden md:inline">{{ post.is_draft ? 'Publish' : 'Hide' }}</span>
            </Btn>
            <Btn size="small"
                 :type="Colors.danger"
                 @click="state.delete(post.id)"
                 :disabled="state.status.deletingId === post.id">
                <TrashIcon class="size-6 md:size-3" />
                <span class="hidden md:inline">Delete</span>
            </Btn>
        </PostListItem>
    </Backdrop>
</template>

<style scoped lang="scss">

</style>
