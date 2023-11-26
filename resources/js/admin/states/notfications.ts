import {defineStore} from "pinia";
import {MandeError} from "mande";

interface State {
    items: [],
}

interface Actions {
    push(e: any): void
}

const useNotificationState = defineStore<string, State, any, Actions>('notifications', {
    state: () => ({
        items: [],
    }),
    actions: {
        push(e): void {
            const err = e as MandeError
            console.error(err.body)
        }
    }
})

export default useNotificationState
