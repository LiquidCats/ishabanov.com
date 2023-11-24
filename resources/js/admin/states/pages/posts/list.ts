import {defineStore} from "pinia";
import {Post} from "../../../types/data";
import {ResponseLinks} from "../../../types/ApiResponse";
import useNotificationState from "../../notfications";
import {changePostState, getPosts, removePost} from "../../../api/posts";

interface State {
    items: Post[],
    pagination: ResponseLinks
    status: {
        listLoading: boolean,
        deletingId: null|number,
        changingStateId: null|number,
    }
}

interface Actions {
    loadPosts(): Promise<any>
    delete(id: number): Promise<any>
    changeState(id: number): Promise<any>
}

const usePostListState = defineStore<string, State, any, Actions>('post-list', {
    state: () => ({
        items: [],
        pagination: {
            first: "",
            last: "",
            prev: "",
            next: "",
        },
        status: {
            listLoading: false,
            deletingId: null,
            changingStateId: null,
        }
    }),
    actions: {
        async loadPosts() {
            this.status.listLoading = true;
            try {
                const response = await getPosts()
                this.items = response.data
                this.pagination = response.links
            } catch (e) {
                const notifications = useNotificationState()

                notifications.push(e as Error)
            } finally {
                this.status.listLoading = false;
            }
        },
        async delete(id: number) {
            try {
                this.status.deletingId = id
                await removePost(id)

                await this.loadPosts()
            } catch (e) {
                const notifications = useNotificationState()

                notifications.push(e as Error)
            } finally {
                this.status.deletingId = null
            }
        },
        async changeState(id: number) {
            try {
                this.status.changingStateId = id

                const response = await changePostState(id)
                const post = response.data
                const index = this.items.findIndex((p: Post) => p.id = post.id)

                this.items[index] = post
            } catch (e) {
                const notifications = useNotificationState()

                notifications.push(e as Error)
            } finally {
                this.status.changingStateId = null
            }
        }
    }
})

export default usePostListState
