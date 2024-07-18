<script setup lang="ts">

import {BlockStyle, fontFamilyStyles} from "../../../types/style";
import {ref, watch} from "vue";
import debounce from "../../../utils/debounce";

interface Props {
    modelValue: Array<BlockStyle>,
}
const props = withDefaults(defineProps<Props>(), {
    modelValue: () => []
})
const emit = defineEmits(['update:modelValue'])

const selected = ref<string>(
    props.modelValue?.find((v) => fontFamilyStyles?.includes(v))
    || BlockStyle.FONT_FAMILY_SANS
)

watch(selected, (v, o) => {
    emit('update:modelValue',  [
        ...props.modelValue?.filter(s => s !== o),
        v,
    ].filter(Boolean))
})

const map = {
    [BlockStyle.FONT_FAMILY_SANS]: 'font-sans',
    [BlockStyle.FONT_FAMILY_SERIF]: 'font-serif',
    [BlockStyle.FONT_FAMILY_MONO]: 'font-mono',
}

</script>

<template>
    <div class="flex rounded-md overflow-clip border border-stone-500 divide-stone-700 divide-x hover:border-stone-400 ease-in-out transition-colors">
        <button v-for="fontFamilyStyle in fontFamilyStyles"
                :key="`font-family-${fontFamilyStyle}`"
                class="dark:bg-stone-600 darl:hover:bg-stone-700 hover:bg-stone-200 duration-300 ease-in-out transition-colors px-4 py-1 uppercase text-sm"
                :class="{
                    'bg-stone-200 dark:bg-stone-700': selected === fontFamilyStyle,
                    [map[fontFamilyStyle]]: true,
                }"
                :disabled="selected === fontFamilyStyle"
                @click="selected = fontFamilyStyle">{{ fontFamilyStyle[0] }}</button>
    </div>
</template>

<style scoped lang="scss">

</style>
