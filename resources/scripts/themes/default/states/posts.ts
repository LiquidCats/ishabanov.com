import {defineStore} from "pinia";
import {PostResource, ResponsePaginationMeta} from "../../../kernel/types/api";
import PostApi from "../../../kernel/api/posts";

interface State {
    items: Array<PostResource>,
    pagination: ResponsePaginationMeta,
    status: {
        loading: boolean,
        loaded: boolean
    }
}

interface Actions {
    paginate(page: number): Promise<void>;
}

const postPayKey: string = 'posts.page'

const usePostsState = defineStore<'app.posts', State, any, Actions>('app.posts', {
    state: (): State => ({
        items: [],
        pagination: {} as ResponsePaginationMeta,
        status: {
            loading: false,
            loaded: true,
        }
    }),
    actions: {
        async paginate(page: number = 1): Promise<void> {
            this.status.loading = true;
            this.status.loaded = false;

            try {

                const response = await PostApi.paginate( page)

                this.items = response.data
                this.pagination = response.meta

                localStorage.setItem(`${postPayKey}.${page}`, JSON.stringify(this.items))

                this.status.loaded = true
            } catch (e) {
                this.status.loaded = false

                console.error(e)
            } finally {
                this.status.loading = false
            }
        }
    }
})

export default usePostsState
