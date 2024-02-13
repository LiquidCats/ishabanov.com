<script setup lang="ts">
    import {Colors} from "../../types/colors";
    import {computed} from "vue";
    interface Props {
        type: Colors,
        icon?: string,
    }
    const props = defineProps<Props>()

    const styles = computed(() => {
        if (props.type === Colors.primary) {
            return 'bg-blue-600 hover:bg-blue-500 text-white'
        }
        if (props.type === Colors.danger) {
            return 'bg-rose-700 hover:bg-rose-600 text-white'
        }
        if (props.type === Colors.success) {
            return 'bg-emerald-700 hover:bg-emerald-600 text-white'
        }
        if (props.type === Colors.warning) {
            return 'bg-yellow-500 hover:bg-yellow-400 text-black'
        }
        if (props.type === Colors.dark) {
            return 'bg-neutral-700 hover:bg-neutral-600 text-white'
        }

        return ''
    })
</script>

<template>
    <button type="button"
            class="flex gap-1 justify-center items-center px-3 py-2 rounded-md duration-300 disabled:bg-slate-300 disabled:cursor-not-allowed"
            :class="`${styles}`"
            @mouseover="isHovered = true">
        <i v-if="icon" :class="'bi bi-' + icon"></i> <slot></slot>
    </button>
</template>

<style scoped lang="scss">

</style>
