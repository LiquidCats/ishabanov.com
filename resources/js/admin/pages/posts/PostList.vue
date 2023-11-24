<script setup lang="ts">
import {onMounted} from "vue";
//
//
import usePostListState from "../../states/pages/posts/list";
//
import PageHeader from "../../components/PageHeader.vue";
import BtnLink from "../../components/BtnLink.vue";
import Btn from "../../components/Btn.vue";
import Tag from "../../components/Tag.vue";

const state = usePostListState()

onMounted(async () => {
    await state.loadPosts()
})

</script>

<template>
    <PageHeader>Posts</PageHeader>
    <div class="mb-3"><BtnLink type="primary" icon="plus" to="/admin/posts/create">Add</BtnLink></div>
    <div class="vstack">
        <div v-if="state.status.listLoading">Loading...</div>
        <div v-if="!state.status.listLoading" v-for="post in state.items" class="col mb-3 border border-1 border-secondary-subtle rounded-3 p-3">
            <div class="h2 mb-3">
                <Tag type="dark">ID: {{ post.id}}</Tag> <router-link :to="`/admin/posts/${post.id}/edit`">{{ post.title }}</router-link>
            </div>
            <div class="text-muted mb-3">Published At: {{ post.published_at}}</div>
            <div class="d-flex gap-1 mb-3">
                <Tag v-for="tag in post.tags" type="primary">{{ tag.name }}</Tag>
            </div>
            <div class="accordion mb-3">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <a class="accordion-button collapsed text-decoration-none" type="button" data-bs-toggle="collapse" :data-bs-target="`#post-preview-${post.id}`" aria-expanded="false" aria-controls="post-preview-1">
                    Preview
                  </a>
                </h2>
                <div :id="`post-preview-${post.id}`" class="accordion-collapse collapse">
                  <div class="accordion-body" v-html="post.preview" />
                </div>
              </div>
            </div>
            <div class="d-flex justify-content-end gap-1 border-1 border-top pt-2">
                <Btn v-if="!post.is_draft"
                        type="warning"
                        icon="eye-slash"
                        @click="state.changeState(post.id)"
                        :disabled="state.status.changingStateId === post.id">Hide</Btn>
                <Btn v-if="post.is_draft"
                        type="success"
                        icon="eye"
                        @click="state.changeState(post.id)"
                        :disabled="state.status.changingStateId === post.id">Publush</Btn>
                <Btn type="danger"
                        icon="trash"
                        @click="state.delete(post.id)" :disabled="state.status.deletingId === post.id">Delete</Btn>
            </div>
        </div>
    </div>
</template>

<style scoped lang="scss">

</style>
