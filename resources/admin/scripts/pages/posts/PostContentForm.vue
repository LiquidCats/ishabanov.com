<script setup lang="ts">
import {computed, ref} from "vue";
import Draggable from "vuedraggable";
//
import usePostState from "../../states/post";
//
import Error from "../../components/atoms/Error.vue";
import {blockRenderers} from "../../types/blocks";

const postState = usePostState()

const dragOptions = computed(() => ({
    animation: 200,
    group: "content",
    disabled: false,
    ghostClass: "ghost"
}))

</script>

<template>
    <div class="mb-3">
        <Draggable v-model="postState.item.blocks"
                   class="grid grid-cols-1 gap-1.5 text-gray-50 mb-1.5"
                   item-key="type"
                   handle=".block-editor-handle"
                   tag="ul"
                   v-bind="dragOptions">
            <template #item="{ element, index }">
                <li>
                    <component :is="blockRenderers[element.type]" :block="element" @remove:block="postState.blockRemove"/>
                </li>
            </template>>
        </Draggable>
        <Error name="content" :errors="postState.errors"/>
    </div>
</template>


<style scoped lang="scss">
.flip-list-move {
  transition: transform 0.5s;
}

.no-move {
  transition: transform 0s;
}

.ghost {
  opacity: 0.5;
}

</style>
