import {defineStore} from "pinia";

interface State {
    images: boolean
    files: boolean
}

export type ModalName = keyof State

interface Actions {
    toggle: (name: ModalName) => void
    close: (name: ModalName) => void
    open: (name: ModalName) => void
}

const useModalsState = defineStore<"admin.modals", State, {}, Actions>('admin.modals', {
    state: () => ({
        images: false,
        files: false,
    }),
    actions: {
        toggle(name: ModalName): void {
            this[name] = !this[name]
        },
        close(name: ModalName): void {
            this[name] = false
        },
        open(name: ModalName): void {
            this[name] = true
        },
    }
})

export default useModalsState
