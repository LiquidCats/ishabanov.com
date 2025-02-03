import {defineStore} from "pinia";
import {PostResource, ResponseLinks} from "@kernel/types/api";
import useNotificationState from "./notfications";
import PostApi from "@kernel/api/posts";

interface State {
    items: PostResource[],
    pagination: {current_page: number} & ResponseLinks
    status: {
        listLoading: boolean,
        deletingId: Array<number>,
        changingStateId: Array<number>,
    }
}

interface Actions {
    paginate(page?: number): Promise<any>
    delete(id: number): Promise<any>
    changeState(id: number): Promise<any>
}

const usePostListState = defineStore<'admin.posts', State, any, Actions>('admin.posts', {
    state: () => ({
        items: [],
        pagination: {
            current_page: 1,
            first: "",
            last: "",
            prev: "",
            next: "",
        },
        status: {
            listLoading: false,
            deletingId: [],
            changingStateId: [],
        }
    }),
    actions: {
        async paginate(page: number = 1) {
            this.status.listLoading = true;
            try {
                const {data, links, meta} = await PostApi.paginate(page)
                this.items = data
                this.pagination = {
                    current_page: meta.current_page,
                    ...links
                }
            } catch (e) {
                const notifications = useNotificationState()

                notifications.pushError(e as Error)
            } finally {
                this.status.listLoading = false;
            }
        },
        async delete(id: number) {
            try {
                this.status.deletingId = [...this.status.deletingId, id]
                await PostApi.removeById(id)

                await this.paginate()
            } catch (e) {
                const notifications = useNotificationState()

                notifications.pushError(e as Error)
            } finally {
                this.status.deletingId = this.status.deletingId.filter(i => i != id)
            }
        },
        async changeState(id: number) {
            try {
                this.status.changingStateId = [...this.status.changingStateId, id]

                const response = await PostApi.changeState(id)
                const post = response.data
                const index = this.items.findIndex((p: PostResource) => p.id === post.id)

                this.items[index] = post
            } catch (e) {
                const notifications = useNotificationState()

                notifications.pushError(e as Error)
            } finally {
                this.status.changingStateId = this.status.changingStateId.filter(i => i != id)
            }
        }
    }
})

export default usePostListState
