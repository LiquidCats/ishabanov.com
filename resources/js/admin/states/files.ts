import {defineStore} from "pinia";
import {ResponseLinks} from "../types/api";
import {File as FileData} from "../types/data";
import * as files from "../api/files";
import {FileToUpload} from "../types/internals";
import useNotificationState from "./notfications";
import useImagesState from "./images";


const fileMapper = (f: File): FileToUpload => {
    const parts: string[] = f.name.split('.')
    const fileToUpload: FileToUpload = {
        file: f,
        name: parts.slice(0, -1).join('.').trim(),
        extension: String(parts.pop()).trim(),
        uploaded: false,
    }
    if (f.type.startsWith('image/')) {
        fileToUpload.preview = URL.createObjectURL(f);
    }

    return fileToUpload
}

interface State {
    items: FileData[]
    previews: FileToUpload[]
    pagination: {current_page: number} & ResponseLinks
    status: {
        filesLoading: boolean
        filesLoaded: boolean
        filesDeleting: string[]
        filesUploading: FileToUpload[]
    }
}

interface Actions {
    removePreview(file: FileToUpload): void
    createFilePreviews(files: FileList): void
    paginate(page?: number): Promise<void>
    upload(fileToUpload?: FileToUpload): Promise<void>
    remove(hash: string): Promise<void>
}

const useFilesState = defineStore<string, State, any, Actions>('files', {
    state: () => ({
        items: [],
        previews: [],
        pagination: {
            current_page: 1,
            first: "",
            last: "",
            prev: "",
            next: "",
        },
        status: {
            filesLoading: false,
            filesLoaded: false,
            filesDeleting: [],
            filesUploading: [],
        }
    }),
    actions: {
        removePreview(file: FileToUpload): void {
            this.previews = this.previews
                .filter(f => f.name !== file.name)
        },
        createFilePreviews(files: FileList): void {
            this.previews = Array.from(files || [])
                .map(fileMapper)
        },
        async upload(fileToUpload?: FileToUpload): Promise<void> {
            const imageState = useImagesState()

            const toUpload = fileToUpload ? [fileToUpload] : this.previews
            let data: FileData[] = []

            try {
                this.status.filesUploading = [...toUpload]
                const response  = await files.upload(toUpload)

                data = response.data

                this.previews = this.previews
                    .filter(u => !data
                        .some(f => f.name === u.name))


                await imageState.load()
            } catch (e) {
                const notifications = useNotificationState()
                notifications.pushError(e as Error)
            } finally {
                this.status.filesUploading = []
            }
        },
        async paginate(page: number = 1): Promise<void> {
            try {
                this.status.filesLoading = true
                this.status.filesLoaded = false

                const {data, meta, links} = await files.getFilesList(page)

                this.items = data
                this.pagination = {...links, current_page: meta.current_page}

                this.status.filesLoaded = true
            } catch (e) {
                const notifications = useNotificationState()
                notifications.pushError(e as Error)
            } finally {
                this.status.filesLoading = true
            }
        },
        async remove(hash: string): Promise<void> {
            try {
                this.status.filesDeleting = [...this.status.filesDeleting, hash]

                await files.remove(hash)

            } catch (e) {
                const notifications = useNotificationState()

                notifications.pushError(e as Error)
            } finally {
                this.status.filesDeleting = this.status
                    .filesDeleting
                    .filter(h => h !== hash)
            }
        }
    }
})

export default useFilesState
