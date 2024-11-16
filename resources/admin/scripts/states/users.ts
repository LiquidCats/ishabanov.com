import {defineStore} from "pinia";
import UserApi from "../api/users";
import {UserResource} from "../types/data";
import {ResponseLinks} from "../types/api";
import useNotificationState from "./notfications";

interface State {
    items: Array<UserResource>,
    pagination: {current_page: number} & ResponseLinks
    status: {
        listLoading: boolean
        listLoaded: boolean
        userRemoving: Array<number>
        userVerifying: Array<number>
    },
}
interface Actions {
    getUsers(page: number): Promise<void>
    remove(userId: number): Promise<void>
    verify(userId: number): Promise<void>
}

const useUsersState = defineStore<'admin.users', State, any, Actions>('admin.users', {
    state: () => ({
        items: [] as Array<UserResource>,
        pagination: {
            current_page: 1
        },
        status: {
            listLoading: false,
            listLoaded: false,
            userRemoving: [],
            userVerifying: []
        }
    }),
    actions: {
        async getUsers(page: number): Promise<void> {
            this.status.listLoading = true;

            try {
                const {
                    data,
                    links,
                    meta
                } = await UserApi.paginate(page)
                this.items = data
                this.pagination = {
                    current_page: meta.current_page,
                    ...links
                }
            } catch (e) {
                const notifications = useNotificationState()

                notifications.pushError(e as Error)
            } finally {
                this.status.listLoading = false;
            }
        },
        async remove(userId: number): Promise<void> {
            try {
                this.status.userRemoving = [...this.status.userRemoving, userId]
                await UserApi.remove(userId)
            } catch (e) {
                const notifications = useNotificationState()

                notifications.pushError(e as Error)
            } finally {
                this.status.userRemoving = this.status.userRemoving.filter(i => i != userId)
            }
        },
        async verify(userId: number): Promise<void> {
            try {
                this.status.userRemoving = [...this.status.userRemoving, userId]
                await UserApi.verify(userId)
            } catch (e) {
                const notifications = useNotificationState()

                notifications.pushError(e as Error)
            } finally {
                this.status.userRemoving = this.status.userRemoving.filter(i => i != userId)
            }
        }
    }
})

export default useUsersState
