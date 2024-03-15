<script setup lang="ts">
import {ref} from "vue";

interface Props {
    isOpen: boolean
}

defineProps<Props>()

</script>

<template>
    <Teleport to="body">
        <Transition name="modal">
            <div class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-start z-40 py-2 overflow-auto" v-if="isOpen">
                <div class="bg-stone-800 p-4 rounded-md shadow-lg min-w-sm max-w-screen-md w-full">
                    <slot></slot>
                </div>
            </div>
        </Transition>
    </Teleport>
</template>

<style scoped lang="scss">
/* we will explain what these classes do next! */
.modal-enter-active,
.modal-leave-active {
  transition: all 0.5s ease-in-out;
}

.modal-enter-from {
    transform: translateY(5%);
}
.modal-enter-to {
    transform: translateY(0);
}

.modal-leave-from {
    transform: translateY(0);
}
.modal-leave-to {
    transform: translateY(5%);
}

.modal-enter-from,
.modal-leave-to {
  opacity: 0;
}
</style>
