<script setup lang="ts">

import Tag from "../../components/atoms/Tag.vue";
import {Post} from "../../types/data";
import {Colors} from "../../types/colors";
import RouteNames from "../../enums/RouteNames";

interface Props {
  post: Post
}

defineProps<Props>()

</script>

<template>
  <div class="col mb-3 border border-1 border-secondary-subtle rounded-3 p-3">
    <div class="h2 mb-3">
      <Tag :type="Colors.dark">ID: {{ post.id}}</Tag> <router-link :to="{name: RouteNames.POST_EDIT, params: {post_id: post.id}}">{{ post.title }}</router-link>
    </div>
    <div class="text-muted mb-3">Published At: {{ post.published_at}}</div>
    <div class="d-flex gap-1 mb-3">
      <Tag v-for="tag in post.tags" :type="Colors.primary">{{ tag.name }}</Tag>
    </div>
    <div class="accordion mb-3">
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed text-decoration-none"
                  type="button"
                  data-bs-toggle="collapse"
                  :data-bs-target="`#post-preview-${post.id}`"
                  aria-expanded="false"
                  aria-controls="post-preview-1">
            Preview
          </button>
        </h2>
        <div :id="`post-preview-${post.id}`" class="accordion-collapse collapse">
          <div class="accordion-body" v-html="post.preview" />
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-end gap-1 border-1 border-top pt-2">
      <slot/>
    </div>
  </div>
</template>

<style scoped lang="scss">

</style>
