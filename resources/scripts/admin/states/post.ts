import {_GettersTree, defineStore, PiniaCustomProperties, StateTree} from "pinia";
import dayjs from "dayjs";
//
import {FileResource, PostResource} from "@kernel/types/api";
import {PreviewTypes} from "@kernel/enums/preview";
//
import PostApi from "@kernel/api/posts";
import useNotificationState from "./notfications";
import {APIResponse, ApiError, ValidationErrors} from "@kernel/types/api";
import {Block} from "@kernel/types/blocks";
import {BlockTypes} from "@kernel/enums/blocks";
import {idMapper} from "../utils/idMapper";
import {UnwrapRef} from "vue";
import {emptyBlocks} from "../utils/blocks/getters";

interface State {
    id: number|null
    item: PostResource
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
    previewAdd(file: FileResource): void
    previewRemove(): void
    blockAdd(type: BlockTypes): void
    cloneBlock(block: Block): void
    blockRemove(block: Block): void
}

interface Getters <S extends StateTree> extends _GettersTree<S> {
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
        previewAdd(file: FileResource) {
            this.item.previewImage = file
            this.item.preview_image_id = file.hash
            this.item.preview_image_type = PreviewTypes.left_side
        },
        previewRemove() {
            this.item.preview_image_id = null;
            this.item.preview_image_type = null;
            this.item.previewImage = null
        },
        blockAdd(type: BlockTypes): void {
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
            let response:APIResponse<PostResource>

            try {
                this.status.postSaving = true
                this.status.postSaved = false


                if (this.id) {
                    response = await PostApi.updateById(this.id, this.item) as APIResponse<PostResource>
                } else {
                    response = await PostApi.create(this.item) as APIResponse<PostResource>
                }

                this.id = response.data.id

                const blocks = response.data.blocks.map<Block>(idMapper)
                this.item = {...this.item, ...response.data, blocks}

                this.status.postSaved = true
            } catch (e: any) {
                const notifications = useNotificationState()
                const response: ApiError<ValidationErrors> = e.body

                this.errors = response.data as ValidationErrors

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

                const {data} = await PostApi.getById(id)

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
