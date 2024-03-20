import {defineStore} from "pinia";
import {Tag} from "../types/data";
import * as tags from "../api/tags";
import useNotificationState from "./notfications";

interface State {
    item: Tag,
    items: Tag[],
    q: string
    status: {
        tagsLoading: boolean,
        tagsLoaded: boolean,
        tagSaving: boolean,
        tagDeleting: number[],
    }
}
interface Actions {
    search(v?: string, force?: boolean): Promise<void>
    remove(tagId: number): Promise<void>
    save(): Promise<void>
}

const useTagsState = defineStore<string, State, any, Actions>('tags', {
    state: () => ({
        item: {},
        items: [],
        q: '',
        status: {
            tagsLoading: false,
            tagsLoaded: false,
            tagDeleting: [],
            tagSaving: false,
        }
    }),
    actions: {
        async search(q: string = '', force: boolean = false) {
            if (this.status.tagsLoaded && q === this.q && !force) {
                this.q = q
                return
            }

            this.q = q

            try {
                this.status.tagsLoaded = false
                this.status.tagsLoading = true

                const {data} = await tags.list(q)
                this.items = data

                this.status.tagsLoaded = true
            } catch (e) {
                const notifications = useNotificationState()

                notifications.pushError(e as Error)
            } finally {
                this.status.tagsLoading = false
            }
        },
        async remove(tagId: number) {
            const notificationState = useNotificationState()

            this.status.tagDeleting = [...this.status.tagDeleting, tagId]

            try {
                await tags.removeById(tagId)

                this.items = this.items.filter(t => t.id !== tagId)
            } catch (e) {
                notificationState.pushError(e as Error)
            } finally {
                this.status.tagDeleting = this.status.tagDeleting.filter(id => id !== tagId)
            }
        },
        async save() {
            const notificationState = useNotificationState()

            this.status.tagSaving = true

            try {
                const {id, name, slug} = this.item
                if (id) {
                    await tags.update(id, {name, slug})
                } else {
                    const {data} = await tags.create({name, slug})
                    this.items = [...this.items, data]
                }
            } catch (e) {
                notificationState.pushError(e as Error)
            } finally {
                this.status.tagSaving = false
            }
        }
    }
})

export default useTagsState
