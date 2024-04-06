<script setup lang="ts">
    import FormSelect from "../../atoms/Form/FormSelect.vue";
    import {computed} from "vue";

    interface Props {
        modelValue: string,
        values: Array<string>
    }

    const props = withDefaults(defineProps<Props>(), {
        modelValue: '',
        values: [],
    })

    const emit = defineEmits(['update:modelValue'])

    const value = computed({
        get: () => props.modelValue,
        set: v => {emit('update:modelValue', v)}
    })
</script>

<template>
    <div>
        <FormSelect :values="values" v-model="value" :deselectable="false"/>
    </div>
</template>

<style scoped lang="scss">

</style>
