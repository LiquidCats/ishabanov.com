<script setup lang="ts">
import {computed} from "vue";
import Draggable from "vuedraggable";
//
import usePostState from "../../../states/post";
//
import Error from "../../atoms/Error.vue";
import {blockRenderers} from "../../../utils/blocks/getters";

const postState = usePostState()

const dragOptions = computed(() => ({
    animation: 200,
    group: "content",
    disabled: false,
    ghostClass: "ghost"
}))

</script>

<template>
    <Draggable :list="postState?.item?.blocks ?? []"
               class="grid grid-cols-1 gap-3 dark:text-gray-50 mb-1.5"
               handle=".block-editor-handle"
               item-key="key"
               tag="ul"
               v-bind="dragOptions">
        <template #item="{ element }">
            <li class="border-b-2 border-dashed dark:border-gray-200 border-gray-400 pb-3">
                <component :is="blockRenderers[element.type]"
                           :block="element"
                           @clone:block="postState.cloneBlock"
                           @remove:block="postState.blockRemove"/>
            </li>
        </template>>
    </Draggable>
    <Error name="blocks" :errors="postState.errors"/>
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
