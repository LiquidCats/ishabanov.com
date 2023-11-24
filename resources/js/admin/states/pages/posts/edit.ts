import {defineStore} from "pinia";
import {File, Post} from "../../../types/data";
import {getPost} from "../../../api/posts";
import useImagesState from "../../images";
import {getImages} from "../../../api/files";
import useNotificationState from "../../notfications";

interface State {
    id: number|null
    item: Post
    previewTypes: {value: string, text: string}[]
    status: {
        postLoading: boolean,
        postLoaded: boolean,
    }
}
interface Actions {
    loadPost(id: number): Promise<any>
}

const usePostEditState = defineStore<string, State, any, Actions>('post-edit', {
    state: () => ({
        id: null,
        previewTypes: [
            {value: 'left_side', text: 'Small preview on the left side'},
            {value: 'fill', text: 'Preview as a background'},
        ],
        item: {} as Post,
        status: {
            postLoading: false,
            postLoaded: false,
            previewsLoading: false,
            previewsLoaded: false,
        }
    }),

    actions: {
        async loadPost(id: number) {
            if (id === this.id && this.status.postLoaded) {
                return
            }

            try {
                this.id = id
                this.status.postLoaded = false
                this.status.postLoading = true

                const {data} = await getPost(id)

                this.item = data

                this.status.postLoaded = true
            } catch (e) {
                const notifications = useNotificationState()

                notifications.push(e as Error)
            } finally {
                this.status.postLoading = false
            }
        }
    }
})

export default usePostEditState
