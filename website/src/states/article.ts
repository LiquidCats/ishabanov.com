import {defineStore} from "pinia";
import ArticleApi from "@/api/articles";
import type {PostResource} from "@/types/api";

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
        async loadArticle(id: number): Promise<void> {
            this.status.loading = true;
            this.id = Number(id)
            try {
                const response = await ArticleApi.getById(id)

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
