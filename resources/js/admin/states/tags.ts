import {defineStore} from "pinia";
import {Tag} from "../types/data";
import * as tags from "../api/tags";
import useNotificationState from "./notfications";

interface State {
    items: Tag[],
    q: string
    status: {
        tagsLoading: boolean,
        tagsLoaded: boolean,
    }
}
interface Actions {
    search(v?: string, force?: boolean): Promise<any>
}

const useTagsState = defineStore<string, State, any, Actions>('tags', {
    state: () => ({
        items: [],
        q: '',
        status: {
            tagsLoading: false,
            tagsLoaded: false,
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

                notifications.push(e as Error)
            } finally {
                this.status.tagsLoading = false
            }
        },
    }
})

export default useTagsState
