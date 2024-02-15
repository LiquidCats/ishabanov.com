<script setup lang="ts">
    import MceEditor from '@tinymce/tinymce-vue'
    import {computed, onMounted, reactive, ref} from "vue";
    import useImagesState from "../../states/images";

    const state = useImagesState()

    const props = defineProps(['modelValue', 'initialValue'])
    const emit = defineEmits(['update:modelValue'])

    const value = computed({
        get() {
            return props.modelValue
        },
        set(value) {
            emit('update:modelValue', value)
        }
    })

    const imageMapper = (f) => ({value: f.path, title: f.name, text: f.name})
    const imageList = computed(() => state.items.map(imageMapper))

    const init = reactive({
        image_list: imageList,
        min_height: 500,
        tinycomments_mode: 'embedded',
        menubar: false,
    });

    onMounted(() => {
        state.load()
    })

</script>

<template>
    <MceEditor api-key="gwnmmtvbsjz0a1q4aolugs385wc6es97mf904lw4okwjzv8j"
               :init="init"
               :initial-value="initialValue"
               plugins="lists link image emoticons code codesample"
               toolbar="blocks | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image emoticons | codesample code"
               v-model="value"/>
</template>


<style scoped lang="scss">

</style>
