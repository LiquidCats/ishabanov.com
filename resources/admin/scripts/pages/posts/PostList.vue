<script setup lang="ts">
import {onMounted, onUnmounted} from "vue";
//
//
import usePostListState from "../../states/posts";
//
import PageHeader from "../../components/molecules/PageHeader.vue";
import BtnLink from "../../components/atoms/BtnLink.vue";
import Btn from "../../components/atoms/Btn.vue";
import PostListItem from "./PostListItem.vue";
import {Colors} from "../../types/colors";
import Pagination from "../../components/molecules/Pagination.vue";

const state = usePostListState()

onMounted(async () => {
    await state.paginate()
})

onUnmounted(() => {
    state.$reset()
})

</script>

<template>
    <PageHeader>Posts</PageHeader>
    <div class="mb-3">
        <BtnLink :type="Colors.primary" icon="plus" to="/admin/posts/create">Add</BtnLink>
    </div>
    <Pagination :links="state.pagination"
                @click:next="state.paginate"
                @click:prev="state.paginate"/>
    <div class="vstack">
        <div v-if="state.status.listLoading">Loading...</div>
        <PostListItem v-if="!state.status.listLoading" v-for="post in state.items" :post="post">
            <Btn v-if="!post.is_draft"
                 :type="Colors.warning"
                 icon="eye-slash"
                 @click="state.changeState(post.id)"
                 :disabled="state.status.changingStateId === post.id">Hide
            </Btn>
            <Btn v-if="post.is_draft"
                 :type="Colors.success"
                 icon="eye"
                 @click="state.changeState(post.id)"
                 :disabled="state.status.changingStateId === post.id">Publish
            </Btn>
            <Btn :type="Colors.danger"
                 icon="trash"
                 @click="state.delete(post.id)" :disabled="state.status.deletingId === post.id">Delete
            </Btn>
        </PostListItem>
    </div>
    <Pagination :links="state.pagination"
                @click:next="state.paginate"
                @click:prev="state.paginate"/>
</template>

<style scoped lang="scss">

</style>
