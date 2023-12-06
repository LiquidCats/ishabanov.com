import {defineStore} from "pinia";
import {Post} from "../types/data";
import {ResponseLinks} from "../types/api";
import useNotificationState from "./notfications";
import {changeState, paginate, removeById} from "../api/posts";

interface State {
    items: Post[],
    pagination: {current_page: number} & ResponseLinks
    status: {
        listLoading: boolean,
        deletingId: null|number,
        changingStateId: null|number,
    }
}

interface Actions {
    paginate(page?: number): Promise<any>
    delete(id: number): Promise<any>
    changeState(id: number): Promise<any>
}

const usePostListState = defineStore<string, State, any, Actions>('posts', {
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
            deletingId: null,
            changingStateId: null,
        }
    }),
    actions: {
        async paginate(page: number = 1) {
            this.status.listLoading = true;
            try {
                const {data, links, meta} = await paginate(page)
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
                this.status.deletingId = id
                await removeById(id)

                await this.paginate()
            } catch (e) {
                const notifications = useNotificationState()

                notifications.pushError(e as Error)
            } finally {
                this.status.deletingId = null
            }
        },
        async changeState(id: number) {
            try {
                this.status.changingStateId = id

                const response = await changeState(id)
                const post = response.data
                const index = this.items.findIndex((p: Post) => p.id = post.id)

                this.items[index] = post
            } catch (e) {
                const notifications = useNotificationState()

                notifications.pushError(e as Error)
            } finally {
                this.status.changingStateId = null
            }
        }
    }
})

export default usePostListState
