import {defineStore} from "pinia";
import {File} from "../types/data";
import useNotificationState from "./notfications";
import {getImages} from "../api/files";
import usePostEditState from "./pages/posts/edit";

interface State {
    items: File[],
    status: {
        imagesLoading: boolean
        imagesUploading: boolean
        imagesLoaded: boolean
    },
}
interface Action {
    load(): Promise<any>
    upload(): Promise<any>
}

const useImagesState = defineStore<string, State, any, Action>('images',{
    state: () => ({
        items: [],
        status: {
            imagesLoading: false,
            imagesUploading: false,
            imagesLoaded: false,
        }
    }),
    actions: {
        async load() {
            if (this.status.imagesLoaded) {
                return
            }

            try {
                this.status.imagesLoaded = false
                this.status.imagesLoading = true

                const {data} = await getImages()
                this.items = data

                this.status.imagesLoaded = true
            } catch (e) {
                const notifications = useNotificationState()

                notifications.push(e as Error)
            } finally {
                this.status.imagesLoading = false
            }
        },
        async upload() {
            try {
                this.status.imagesUploading = true
            } catch (e) {
                const notifications = useNotificationState()

                notifications.push(e as Error)
            } finally {
                this.status.imagesUploading = false
            }
        }
    }
})

export default useImagesState
