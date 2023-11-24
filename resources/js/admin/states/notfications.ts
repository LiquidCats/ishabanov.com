import {defineStore} from "pinia";

interface State {
    items: [],
}

interface Actions {
    push(e: Error): void
}

const useNotificationState = defineStore<string, State, any, Actions>('notifications', {
    state: () => ({
        items: [],
    }),
    actions: {
        push(e: Error) {
            console.log(e)
            //this.items.push()
        }
    }
})

export default useNotificationState
