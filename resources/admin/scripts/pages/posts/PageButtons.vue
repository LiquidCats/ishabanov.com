<script setup lang="ts">
import {computed} from "vue";
import {useRoute, useRouter} from "vue-router";
import {ArrowDownOnSquareIcon, ArrowLeftIcon, EyeIcon, EyeSlashIcon} from "@heroicons/vue/20/solid";
//
import Btn from "../../components/atoms/Btn.vue";
//
import RouteNames from "../../enums/RouteNames";
import usePostState from "../../states/post";
import useImagesState from "../../states/images";
import useTagsState from "../../states/tags";

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
    <div class="flex flex-row gap-1.5 sticky top-0 bg-neutral-800 z-[1] w-full p-2">
        <div>
            <Btn type="light" @click="router.back()">
                <ArrowLeftIcon class="size-6"/> Back
            </Btn>
        </div>

        <div class="ml-auto">
            <slot></slot>
        </div>

        <div>
            <Btn :type="postState.item.is_draft ? 'warning' : 'success'"  @click.prevent="changeState" :disabled="shouldDisable" v-if="postId">
                <span class="flex flex-row items-center justify-center gap-1"
                      v-if="postState.item.is_draft">
                    <EyeSlashIcon class="size-6" />
                    <span class="hidden md:inline">Hide</span>
                </span>
                <span class="flex flex-row items-center justify-center gap-1"
                      v-else>
                    <EyeIcon class="size-6" />
                    <span class="hidden md:inline">Publish</span>
                </span>
            </Btn>
        </div>

        <div>
            <Btn type="primary" @click.prevent="savePost" :disabled="shouldDisable">
                <ArrowDownOnSquareIcon class="size-6" /> Save
            </Btn>
        </div>

    </div>
</template>

<style scoped lang="scss">

</style>
