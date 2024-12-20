<script setup lang="ts">
import {Colors} from "../../types/colors";
import {ButtonHTMLAttributes} from "vue";
import {Icons} from "../../utils/icons";

interface Props extends /* @vue-ignore */ Partial<Omit<ButtonHTMLAttributes, "type">> {
    type?: keyof typeof Colors | 'default',
    size?: keyof typeof sizes | 'base',
    icon?: keyof typeof Icons,
}

withDefaults(defineProps<Props>(), {
    type: 'default',
    size: 'base',
    icon: null
})

const sizes = {
    base: 'py-1.5 px-3',
    small: 'py-1 px-2 text-sm',
}

const types = {
    [Colors.primary]: 'bg-blue-600 hover:bg-blue-500 text-white',
    [Colors.danger]: 'bg-rose-800 hover:bg-rose-700 text-white',
    [Colors.success]: 'bg-emerald-700 hover:bg-emerald-600 text-white',
    [Colors.warning]: 'bg-yellow-500 hover:bg-yellow-400 text-black',
    [Colors.dark]: 'bg-neutral-700 hover:bg-neutral-600 text-white',
    [Colors.light]: 'bg-neutral-300 hover:bg-neutral-400 text-neutral-800',
    default: 'bg-neutral-200 hover:bg-neutral-300 text-neutral-800',
}

</script>

<template>
    <button type="button"
            class="inline-flex gap-1 justify-center items-center rounded-md duration-300 disabled:text-neutral-500 disabled:bg-slate-300 disabled:cursor-not-allowed"
            :class="`${types[type] ?? types.default} ${sizes[size] ?? sizes.base}`">
        <component v-if="icon" :is="Icons[icon]"  class="size-4"/>
        <slot></slot>
    </button>
</template>

<style scoped lang="scss">

</style>
