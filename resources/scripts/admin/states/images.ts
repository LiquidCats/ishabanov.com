import {defineStore} from "pinia";
import {FileResource} from "@kernel/types/api";
import useNotificationState from "./notfications";
import FileApi from "@kernel/api/files";

interface State {
    items: FileResource[],
    status: {
        imagesLoading: boolean
        imagesUploading: boolean
        imagesLoaded: boolean
    },
}
interface Action {
    load(): Promise<any>
}

const useImagesState = defineStore<'admin.images', State, any, Action>('admin.images',{
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

                const {data} = await FileApi.getImages()
                this.items = data

                this.status.imagesLoaded = true
            } catch (e) {
                const notifications = useNotificationState()

                notifications.pushError(e as Error)
            } finally {
                this.status.imagesLoading = false
            }
        },
    }
})

export default useImagesState
