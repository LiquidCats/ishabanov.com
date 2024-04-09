import {defineStore} from "pinia";
import dayjs from "dayjs";
//
import {Post} from "../types/data";
//
import * as posts from "../api/posts";
import useNotificationState from "./notfications";
import {Api, ApiError, ValidationErrors} from "../types/api";
import {Block, BlockType, emptyBlocks} from "../types/blocks";

interface State {
    id: number|null
    item: Post
    previewTypes: {value: string, text: string}[]
    errors: ValidationErrors
    status: {
        postLoading: boolean
        postLoaded: boolean
        postSaving: boolean
        postSaved: boolean
    }
}
interface Actions {
    load(id: number): Promise<void>
    save(): Promise<void>
    changeState(): Promise<void>
    blockAdd(type: BlockType): void
    blockRemove(block: Block): void
}

const usePostState = defineStore<string, State, any, Actions>('post', {
    state: () => ({
        id: null,
        previewTypes: [
            {value: 'left_side', text: 'Left Side'},
            {value: 'fill', text: 'Background'},
        ],
        errors: {},
        item: {
            id: -1,
            title: '',
            preview: '',
            preview_image_type: null,
            preview_image_id: null,
            content: '',
            blocks: [],
            is_draft: false,
            tags: [],
            published_at: dayjs().format('YYYY-MM-DD HH:mm'),
            reading_time: 0,
            previewImage: null,
        },
        status: {
            postLoading: false,
            postLoaded: false,
            postSaving: false,
            postSaved: false,
        }
    }),
    actions: {
        blockAdd(type: BlockType): void {
            this.item.blocks = [...this.item.blocks, emptyBlocks[type]]
        },
        blockRemove(block: Block): void {
            this.item.blocks = this.item.blocks.filter((b: Block) => b !== block)
        },
        async save() {
            let response:Api<Post>

            try {
                this.status.postSaving = true
                this.status.postSaved = false


                if (this.id) {
                    response = await posts.updateById(this.id, this.item) as Api<Post>
                } else {
                    response = await posts.create(this.item) as Api<Post>
                }

                this.id = response.data.id
                this.item = {...this.item, ...response.data}

                this.status.postSaved = true
            } catch (e: any) {
                const notifications = useNotificationState()
                const response: ApiError<ValidationErrors> = e.body

                this.errors = response.data

                notifications.pushError(e as Error)
            } finally {
                this.status.postSaving = false
            }
        },
        async load(id: number) {
            if (id === this.id && this.status.postLoaded) {
                return
            }

            try {
                this.id = id
                this.status.postLoaded = false
                this.status.postLoading = true

                const {data} = await posts.getById(id)

                this.item = data

                this.status.postLoaded = true
            } catch (e) {
                const notifications = useNotificationState()

                notifications.pushError(e as Error)
            } finally {
                this.status.postLoading = false
            }
        },
        async changeState() {
            this.item.is_draft = !this.item.is_draft
            await this.save();
        }
    }
})

export default usePostState
