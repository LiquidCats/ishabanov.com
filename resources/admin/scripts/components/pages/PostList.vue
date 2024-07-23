<script setup lang="ts">
import {onMounted, onUnmounted} from "vue";
import {PlusIcon} from "@heroicons/vue/20/solid";
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

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
            <div class="md:col-span-2 text-white text-center text-5xl" v-if="state.status.listLoading">Loading...</div>
            <PostListItem v-else
                          v-for="post in state.items"
                          :key="`post-${post.id}`"
                          :post-id="post.id"
                          :published-at="post.published_at"
                          :tags="post.tags"
                          :title="post.title">
                <Btn v-if="!post.is_draft"
                     :type="Colors.warning"
                     @click="state.changeState(post.id)"
                     :disabled="state.status.changingStateId === post.id">Hide
                </Btn>
                <Btn v-if="post.is_draft"
                     :type="Colors.success"
                     @click="state.changeState(post.id)"
                     :disabled="state.status.changingStateId === post.id">Publish
                </Btn>
                <Btn :type="Colors.danger"
                     @click="state.delete(post.id)"
                     :disabled="state.status.deletingId === post.id">Delete
                </Btn>
            </PostListItem>
        </div>
    </Backdrop>
</template>

<style scoped lang="scss">

</style>
