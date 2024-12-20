<script setup lang="ts">

import FormLabel from "../../atoms/Form/FormLabel.vue";
import FormField from "../../atoms/Form/FormField.vue";
import Error from "../../atoms/Error.vue";
import {ValidationErrors} from "../../../types/api";
import {computed, InputTypeHTMLAttribute} from "vue";

interface Props {
    name: string
    placeholder: string
    errors: ValidationErrors
    success?: boolean
    type: InputTypeHTMLAttribute
}

const props = withDefaults(defineProps<Props>(), {
    success: false,
    type: 'text',
})

const model = defineModel()

const isFailed = computed(() => model.value && props.errors[props.name])

</script>

<template>
    <div>
        <FormLabel :for="name">{{ placeholder }}</FormLabel>
        <FormField :id="name"
                   :type="type"
                   v-model="model"
                   :placeholder="placeholder"
                   :failed="isFailed"
                   :success="success"/>
        <Error :errors="errors" :name="name" />
    </div>
</template>

<style scoped lang="scss">

</style>
