import {defineStore} from "pinia";
import {TagResource} from "@kernel/types/api";
import TagApi from "@kernel/api/tags";
import useNotificationState from "./notfications";

interface State {
    item: TagResource,
    items: TagResource[],
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
    fastSave(): Promise<void>
    save(): Promise<void>
}

const useTagsState = defineStore<'admin.tags', State, any, Actions>('admin.tags', {
    state: () => ({
        item: {} as TagResource,
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

                const {data} = await TagApi.list(q)
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
                await TagApi.removeById(tagId)

                this.items = this.items.filter(t => t.id !== tagId)
            } catch (e) {
                notificationState.pushError(e as Error)
            } finally {
                this.status.tagDeleting = this.status.tagDeleting.filter(id => id !== tagId)
            }
        },
        async fastSave() {
            const notificationState = useNotificationState()
            this.status.tagSaving = true

            try {
                const {data} = await TagApi.create({name: this.q})
                this.items = [...this.items, data]
            } catch (e) {
                notificationState.pushError(e as Error)
            } finally {
                this.status.tagSaving = false
            }

        },
        async save() {
            const notificationState = useNotificationState()

            this.status.tagSaving = true

            try {
                const {id, name, slug} = this.item
                if (id) {
                    await TagApi.update(id, {name, slug})
                } else {
                    const {data} = await TagApi.create({name, slug})
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
