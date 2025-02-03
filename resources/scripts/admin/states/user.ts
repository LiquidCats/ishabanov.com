import {MandeError} from "mande";
import {defineStore} from "pinia";
import {UserResource, ValidationErrors} from "@kernel/types/api";
import UserApi from "@kernel/api/users";
import useNotificationState from "./notfications";

interface State {
    id: number
    item: UserResource & {
        password?: string
        password_confirmation?: string
        current_password?: string
    }
    errors: ValidationErrors,
    status: {
        userLoading: boolean
        userLoaded: boolean
        userSaving: boolean
        userSaved: boolean
    }
}

interface Actions {
    getUser(id: number): Promise<void>
    create(): Promise<void>
}

const useUserState = defineStore<string, State, any, Actions>('admin.user', {
    state: () => ({
        id: 0,
        item: {} as any,
        errors: {},
        status: {
            userLoading: false,
            userLoaded: false,
            userSaving: false,
            userSaved: false,
        }
    }),
    actions: {
        async getUser(id: number): Promise<void> {
            if (this.id === id && this.status.userLoaded) {
                return
            }

            try {
                this.id = id
                this.status.userLoaded = false
                this.status.userLoading = true

                const {data} = await UserApi.get(id)
                this.item = data

                this.status.userLoaded = true
            } catch (e) {
                const notifications = useNotificationState()

                notifications.pushError(e as Error)
            } finally {
                this.status.userLoading = false
            }
        },
        async create(): Promise<void> {
            try {
                this.errors = {}
                this.status.userSaving = true
                this.status.userSaved = false

                const response = await UserApi.create(this.item)
                this.id = response.data.id
                this.item = response.data

                this.status.userSaved = true
            } catch (e) {
                const error = e as MandeError
                const notifications = useNotificationState()
                this.errors = error.body.data
                notifications.pushError(e as Error)
            } finally {
                this.status.userSaving = false
            }
        }
    }
})

export default useUserState
