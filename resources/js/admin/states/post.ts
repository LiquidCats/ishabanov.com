import {defineStore} from "pinia";
import dayjs from "dayjs";
//
import {Post} from "../types/data";
//
import * as posts from "../api/posts";
import useNotificationState from "./notfications";
import {Api} from "../types/api";
import {Router} from "vue-router";
import RouteNames from "../enums/RouteNames";


interface State {
    id: number|null
    item: Post
    previewTypes: {value: string, text: string}[]
    status: {
        postLoading: boolean
        postLoaded: boolean
        postSaving: boolean
        postSaved: boolean
    }
}
interface Actions {
    load(id: number): Promise<void>
    save(router: Router): Promise<void>
}

const usePostState = defineStore<string, State, any, Actions>('post', {
    state: () => ({
        id: null,
        previewTypes: [
            {value: 'left_side', text: 'Small preview on the left side'},
            {value: 'fill', text: 'Preview as a background'},
        ],
        item: {
            id: -1,
            title: '',
            preview: '',
            preview_image_type: null,
            preview_image_id: null,
            content: '',
            is_draft: false,
            tags: [],
            published_at: dayjs().format('YYYY-MM-DD HH:mm'),
            reading_time: 0,
            previewImage: null
        },
        status: {
            postLoading: false,
            postLoaded: false,
            postSaving: false,
            postSaved: false,
        }
    }),
    actions: {
        async save(router: Router) {
            let response:Api<Post>

            try {
                this.status.postSaving = true
                this.status.postSaved = false


                if (this.id) {
                    response = await posts.updateById(this.id, this.item as Post)
                } else {
                    response = await posts.create(this.item as Post)
                }

                this.item = {...this.item, ...response.data}
                if (this.id === null && response.data.id) {
                    this.id = response.data.id

                    await router.replace({
                        name: RouteNames.POST_EDIT,
                        params: {post_id: this.id}
                    })
                }

                this.status.postSaved = true
            } catch (e: any) {
                const notifications = useNotificationState()

                notifications.pushError(e as Error)
            } finally {
                this.status.postSaving = false
            }
        },
        async load(id: number) {
            if (id === this.id && this.status.postLoaded) {
                return
            }

            try {
                this.id = id
                this.status.postLoaded = false
                this.status.postLoading = true

                const {data} = await posts.getById(id)

                this.item = data

                this.status.postLoaded = true
            } catch (e) {
                const notifications = useNotificationState()

                notifications.pushError(e as Error)
            } finally {
                this.status.postLoading = false
            }
        }
    }
})

export default usePostState
