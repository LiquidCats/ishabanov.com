<script setup lang="ts">

import {BlockStyle, fontSizeStyles} from "../../../types/style";
import {ref, watch} from "vue";
import debounce from "../../../utils/debounce";
import FormSelect from "../../atoms/Form/FormSelect.vue";

interface Props {
    modelValue: Array<BlockStyle>
}

const props = withDefaults(defineProps<Props>(), {
    modelValue: []
})
const emit = defineEmits(['update:modelValue'])

const selected = ref<string>(props.modelValue?.find((v) => fontSizeStyles?.includes(v)))

watch(selected, debounce((v, o) => {
    emit('update:modelValue',  [
        ...props.modelValue.filter(s => s !== o),
        v,
    ].filter(Boolean))
}, 300))

</script>

<template>
    <div>
        <FormSelect :values="fontSizeStyles" v-model="selected" deselectable/>
    </div>
</template>
