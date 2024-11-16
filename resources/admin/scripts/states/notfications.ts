import {defineStore} from "pinia";
import {MandeError} from "mande";
import {NotificationMessage} from "../types/internals";
import {Colors} from "../types/colors";
import {ApiError} from "../types/api";

interface State {
    items: NotificationMessage[],
}

interface Actions {
    pushSuccess(message: string): void
    pushError(e: Error): void
    push(message: NotificationMessage): void
    close(message: NotificationMessage): void
}

const useNotificationState = defineStore<'admin.notifications', State, any, Actions>('admin.notifications', {
    state: () => ({
        items: [],
    }),
    actions: {
        pushSuccess(message: string) {
            this.push({
                message,
                type: Colors.success,
            })
        },
        pushError(e: Error) {
            const err = e as MandeError<ApiError>

            this.push({
                message: err.body?.message ?? err.message,
                type: Colors.danger
            })
        },
        push(message): void {
            this.items = [...this.items, message]

            setTimeout(() => {
                this.items = this.items.toSpliced(0, 1)
            }, 2500)
        },
        close(message: NotificationMessage): void {
            this.items = this.items
                .filter(m => m !== message)
}
    }
})

export default useNotificationState
