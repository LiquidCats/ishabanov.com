import {defineStore} from "pinia";
import {PostResource} from "../domain/types/api";
import PostApi from "../api/posts";

interface State {
    id: number
    item: PostResource
    meta: {
        similar: PostResource[]
        prev: Partial<PostResource>
        next: Partial<PostResource>
    }
    status: {
        loading: boolean
        loaded: boolean
    }
}

interface Actions {
    loadArticle(id: number): Promise<void>
}

const useArticleState = defineStore<'app.article', State, any, Actions>('app.article', {
    state: () => ({
        id: 0,
        item: {} as PostResource,
        meta: {
            similar: [],
            prev: {},
            next: {},
        },
        status: {
            loading: false,
            loaded: false,
        }
    }),
    actions: {
        async loadArticle(id: number) {
            this.status.loading = true;
            this.id = Number(id)
            try {
                const response = await PostApi.getById(id)

                this.item = response.data
                this.meta.similar = response.meta?.similar
                this.meta.prev = response.meta?.previous
                this.meta.next = response.meta?.next

                this.status.loaded = true;
            } catch (e) {
                console.error(e)
                this.status.loaded = false;
            } finally {
                this.status.loading = false;
            }

        }
    }
})

export default useArticleState
