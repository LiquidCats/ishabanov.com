<script setup lang="ts">
    import {Colors} from "../../types/colors";
    import {computed} from "vue";

    interface Props {
        type: keyof typeof Colors
    }

    const props = defineProps<Props>()


    const styles = computed(() => {
        if (props.type === Colors.primary) {
            return 'bg-blue-600 text-gray-50'
        }
        if (props.type === Colors.secondary) {
            return 'bg-indigo-500 text-gray-50'
        }
        if (props.type === Colors.danger) {
            return 'bg-rose-700 text-gray-50'
        }
        if (props.type === Colors.success) {
            return 'bg-emerald-700 text-gray-50'
        }
        if (props.type === Colors.warning) {
            return 'bg-yellow-500 text-black'
        }
        if (props.type === Colors.dark) {
            return 'bg-neutral-800 text-gray-50'
        }

        return ''
    })
</script>

<template>
    <span :class="`text-xs px-2 py-1 rounded text-nowrap ${styles}`" v-bind="$attrs"><slot></slot></span>
</template>

<style scoped lang="scss">

</style>
