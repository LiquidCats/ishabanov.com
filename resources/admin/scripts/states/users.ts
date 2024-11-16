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
    },
}
interface Actions {
    getUsers(page: number): Promise<void>
}

const useUsersState = defineStore<'admin.users', State, any, Actions>('admin.users', {
    state: () => ({
        items: [] as Array<UserResource>,
        pagination: {
            current_page: 1
        },
        status: {
            listLoading: false,
            listLoaded: false
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
        }
    }
})

export default useUsersState
