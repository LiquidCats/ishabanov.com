import {defineStore} from "pinia";
import {UserResource} from "../types/data";
import {ValidationErrors} from "../types/api";
import UserApi from "../api/users";
import useNotificationState from "./notfications";

interface State {
    id: number
    item: UserResource
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
}

const useUserState = defineStore<string, State, any, Actions>('admin.user', {
    state: () => ({
        id: 0,
        item: {} as UserResource,
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
                this.status.postLoaded = false
                this.status.postLoading = true

                const {data} = await UserApi.get(id)
                this.item = data

                this.status.postLoaded = true
            } catch (e) {
                const notifications = useNotificationState()

                notifications.pushError(e as Error)
            } finally {
                this.status.userLoading = false
            }


        }
    }
})

export default useUserState
