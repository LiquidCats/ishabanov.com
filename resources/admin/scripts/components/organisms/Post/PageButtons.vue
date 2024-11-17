<script setup lang="ts">
import {computed} from "vue";
import {useRoute, useRouter} from "vue-router";
import {ArrowDownOnSquareIcon, ArrowLeftIcon, EyeIcon, EyeSlashIcon} from "@heroicons/vue/20/solid";
//
import Btn from "../../atoms/Btn.vue";
//
import RouteNames from "../../../enums/RouteNames";
import usePostState from "../../../states/post";
import useImagesState from "../../../states/images";
import useTagsState from "../../../states/tags";
import FloatingPanel from "../../molecules/FloatingPanel.vue";
import BackButton from "../../molecules/Buttons/BackButton.vue";
import SaveButton from "../../molecules/Buttons/SaveButton.vue";

const postState = usePostState()
const imagesState = useImagesState()
const tagsState = useTagsState()

const route = useRoute()
const router = useRouter()

const postId: number = parseInt(route?.params?.post_id?.toString())

async function savePost() {
    await postState.save()

    if (!postId && postState.id) {
        await router.replace({
            name: RouteNames.POST_EDIT,
            params: {post_id: this.id}
        })
    }
}

async function changeState() {
    await postState.changeState()
}


const shouldDisable = computed(() =>
    postState.status.postLoading
    || postState.status.postSaving
    || imagesState.status.imagesLoading
    || imagesState.status.imagesUploading
    || tagsState.status.tagsLoading
)

</script>

<template>
    <FloatingPanel class="my-3">
        <div><BackButton /></div>

        <div class="ml-auto">
            <slot :disabled="shouldDisable"></slot>
        </div>

        <div>
            <Btn :type="postState.item.is_draft?'success':'warning'" @click.prevent="changeState" :disabled="shouldDisable" v-if="postId">
                <span class="flex flex-row items-center justify-center gap-1"
                      v-if="postState.item.is_draft">
                    <EyeIcon class="size-6" />
                    <span class="hidden md:inline">Publish</span>
                </span>
                <span class="flex flex-row items-center justify-center gap-1"
                      v-else>
                    <EyeSlashIcon class="size-6" />
                    <span class="hidden md:inline">Hide</span>
                </span>
            </Btn>
        </div>

        <div><SaveButton @click.prevent="savePost" :disabled="shouldDisable"/></div>

    </FloatingPanel>
</template>

<style scoped lang="scss">

</style>
