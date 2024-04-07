<script setup lang="ts">

import {BlockStyle, fontWeightStyles} from "../../../types/style";
import {ref, watch} from "vue";
import debounce from "../../../utils/debounce";
import FormSelect from "../../atoms/Form/FormSelect.vue";

interface Props {
    modelValue: Array<BlockStyle>
}

const props = withDefaults(defineProps<Props>(), {
    modelValue: () => []
})
const emit = defineEmits(['update:modelValue'])

const selected = ref<string>(props.modelValue?.find((v) => fontWeightStyles?.includes(v)))

watch(selected, (v, o) => {
    emit('update:modelValue',  [
        ...props.modelValue.filter(s => s !== o),
        v,
    ].filter(Boolean))
})

</script>

<template>
    <div>
        <FormSelect :values="fontWeightStyles" v-model="selected" deselectable/>
    </div>
</template>
