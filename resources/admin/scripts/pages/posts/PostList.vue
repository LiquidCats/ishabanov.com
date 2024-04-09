<script setup lang="ts">
import {onMounted, onUnmounted} from "vue";
import {PlusIcon} from "@heroicons/vue/20/solid";
//
import usePostListState from "../../states/posts";
//
import PageHeader from "../../components/molecules/PageHeader.vue";
import BtnLink from "../../components/atoms/BtnLink.vue";
import Btn from "../../components/atoms/Btn.vue";
import PostListItem from "./PostListItem.vue";
import {Colors} from "../../types/colors";
import Pagination from "../../components/molecules/Pagination.vue";
import post from "../../states/post";

const state = usePostListState()

onMounted(async () => {
    await state.paginate()
})

onUnmounted(() => {
    state.$reset()
})

</script>

<template>
    <div class="flex items-center mb-3 justify-between bg-neutral-800 p-3 sticky top-0">
        <BtnLink type="light" to="/admin/posts/create">
            <PlusIcon class="size-6"/>Add
        </BtnLink>
        <Pagination :links="state.pagination"
                    @click:next="state.paginate"
                    @click:prev="state.paginate"/>
    </div>
    <div class="px-3">


        <PageHeader class="my-6">Posts</PageHeader>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
            <div class="md:col-span-2 text-white text-center text-5xl" v-if="state.status.listLoading">Loading...</div>
            <PostListItem v-if="!state.status.listLoading" v-for="post in state.items" :key="`post-${post.id}`" :post="post">
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
                     @click="state.delete(post.id)" :disabled="state.status.deletingId === post.id">Delete
                </Btn>
            </PostListItem>
        </div>
    </div>
</template>

<style scoped lang="scss">

</style>
