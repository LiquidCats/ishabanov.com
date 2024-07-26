import {defineStore} from "pinia";
import {PreviewTypeEnum} from "../domain/enums/preview";
import {PostResource, ResponsePaginationMeta, TagResource} from "../domain/types/api";

interface PageState {
    items: Array<PostResource>,
    pagination: ResponsePaginationMeta,
    status: {
        loading: boolean,
        loaded: boolean
    }
}

interface State {
    prev: PageState|null
    current: PageState
    next: PageState|null
}

interface Actions {
    loadCurrent(): Promise<void>
    loadPrev(): Promise<void>
    loadNext(): Promise<void>
    switchToNext(): void
    switchToPrev(): void
}

const usePostsState = defineStore<'app.posts', State, any, Actions>('app.posts', {
    state: (): State => ({
        prev: null,
        current: {
            items: items,
            pagination: {} as ResponsePaginationMeta,
            status: {
                loading: false,
                loaded: true,
            }
        },
        next: null,
    }),
    actions: {
        async loadCurrent() {

        },
        async loadPrev() {

        },
        async loadNext() {

        },
        switchToNext() {
            this.prev = this.current
            this.current = this.next
            this.next = null
        },
        switchToPrev() {
            this.next = this.current
            this.current = this.prev
            this.prev = null
        },
    }
})


const tags: Array<TagResource> = [
    {
        id: 1,
        name: 'Artificial Intelligence',
        slug: '',
    },
    {
        id: 2,
        name: 'Skill Development',
        slug: '',
    },
    {
        id: 3,
        name: 'IT Careers',
        slug: '',
    },
    {
        id: 4,
        name: 'IT Industry',
        slug: '',
    },
]
const items: Array<PostResource> = [
    {
        id: 1,
        title: 'Test title',
        preview: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus at deserunt dolore dolores earum, laboriosam magnam, molestiae neque nesciunt odit quibusdam quis quos recusandae rem repudiandae saepe sed sunt unde.',
        is_draft: false,
        published_at: '2024-06-25 10:00:00',
        reading_time: 6,
        preview_image_type: PreviewTypeEnum.fill,
        preview_image_id: 1,
        blocks: [],
        tags,
        previewImage: {
            hash: 'test',
            type: 'image',
            path: 'https://files.ishabanov.com/ishabanov/production/media/IhAfcP3erhsmihp651IhsSJarYMH4iPrBeHLX6FW.jpg',
            extension: '.jpb',
            name: 'Lalala',
            file_size: 102,
        },
    },
    {
        id: 2,
        title: 'Test title',
        preview: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus at deserunt dolore dolores earum, laboriosam magnam, molestiae neque nesciunt odit quibusdam quis quos recusandae rem repudiandae saepe sed sunt unde.',
        is_draft: false,
        published_at: '2024-06-25 10:00:00',
        reading_time: 6,
        preview_image_type: PreviewTypeEnum.left_side,
        preview_image_id: 1,
        blocks: [],
        tags,
        previewImage: {
            hash: 'test',
            type: 'image',
            path: 'https://files.ishabanov.com/ishabanov/production/media/IhAfcP3erhsmihp651IhsSJarYMH4iPrBeHLX6FW.jpg',
            extension: '.jpb',
            name: 'Lalala',
            file_size: 102,
        },
    },
    {
        id: 3,
        title: 'Test title',
        preview: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus at deserunt dolore dolores earum, laboriosam magnam, molestiae neque nesciunt odit quibusdam quis quos recusandae rem repudiandae saepe sed sunt unde.',
        is_draft: false,
        published_at: '2024-06-25 10:00:00',
        reading_time: 6,
        preview_image_type: null,
        preview_image_id: 1,
        blocks: [],
        tags,
        previewImage: {
            hash: 'test',
            type: 'image',
            path: 'https://files.ishabanov.com/ishabanov/production/media/IhAfcP3erhsmihp651IhsSJarYMH4iPrBeHLX6FW.jpg',
            extension: '.jpb',
            name: 'Lalala',
            file_size: 102,
        },
    },
]

export default usePostsState
