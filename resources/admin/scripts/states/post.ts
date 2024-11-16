import {_GettersTree, defineStore, PiniaCustomProperties} from "pinia";
import dayjs from "dayjs";
//
import {File, Post, PreviewTypes} from "../types/data";
//
import * as posts from "../api/posts";
import useNotificationState from "./notfications";
import {Api, ApiError, ValidationErrors} from "../types/api";
import {Block, BlockType} from "../types/blocks";
import {idMapper} from "../utils/idMapper";
import {UnwrapRef} from "vue";
import {emptyBlocks} from "../utils/blocks/getters";

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
    previewAdd(file: File): void
    previewRemove(): void
    blockAdd(type: BlockType): void
    cloneBlock(block: Block): void
    blockRemove(block: Block): void
}

interface Getters <S> extends _GettersTree<S> {
    hasPreview: (state: UnwrapRef<S> & PiniaCustomProperties) => boolean
}

const usePostState = defineStore<'admin.post', State, Getters<State>, Actions>('admin.post', {
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
    getters: {
        hasPreview: state => !!state.item?.previewImage?.path
    },
    actions: {
        previewAdd(file: File) {
            this.item.previewImage = file
            this.item.preview_image_id = file.hash
            this.item.preview_image_type = PreviewTypes.LEFT_SIDE
        },
        previewRemove() {
            this.item.preview_image_id = null;
            this.item.preview_image_type = null;
            this.item.previewImage = null
        },
        blockAdd(type: BlockType): void {
            this.item.blocks = [...this.item.blocks, idMapper(emptyBlocks[type])]
        },
        cloneBlock(block: Block): void {
            const blocks = this.item.blocks as Array<Block>
            const index = blocks.findIndex(b => b === block)

            this.item.blocks = [
                ...blocks.slice(0, index+1),
                idMapper({...block, content: emptyBlocks[block.type].content}),
                ...blocks.slice(index+1),
            ].map(idMapper)
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

                const blocks = response.data.blocks.map<Block>(idMapper)
                this.item = {...this.item, ...response.data, blocks}

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

                const blocks = data.blocks.map(idMapper)
                this.item = {...data, blocks}

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
