import {defineStore} from "pinia";
import {Tag} from "../types/data";

interface State {
    items: Tag[],
    status: {
        tagsLoading: boolean,
        tagsLoaded: boolean,
    }
}
interface Actions {
    load(): Promise<any>
    search(v: string): Promise<any>
}

const useTagsState = defineStore<string, State, any, Actions>('tags', {
    state: () => ({
        items: [],
        status: {
            tagsLoading: false,
            tagsLoaded: false,
        }
    }),
    actions: {
        async load() {
        },
        async search(v: string) {
        },
    }
})
