<script setup lang="ts">
    import MceEditor from '@tinymce/tinymce-vue'
    import {computed, onMounted, reactive} from "vue";
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

    const handler = async (blobInfo, progress) => {

    }

    const imageMapper = (f) => ({value: f.path, title: f.name, text: f.name})
    const imageList = computed(() => state.items.map(imageMapper))

    const init = reactive({
        images_upload_handler: handler,
        image_list: imageList,
        min_height: 500,
        tinycomments_mode: 'embedded',
        plugins: [
            'autolink', 'autoresize', 'codesample', 'link', 'lists', 'media',
            'table', 'image', 'quickbars', 'codesample', 'help', 'code',
        ],
        toolbar: 'undo redo | blocks | bold italic underline strikethrough | alignleft aligncenter alignright | indent outdent | bullist numlist | codesample code | table | link | emoticons | image',
        menubar: false,
    });

    onMounted(() => {
        state.load()
    })
</script>

<template>
    <MceEditor v-if="state.status.imagesLoaded"
               api-key="gwnmmtvbsjz0a1q4aolugs385wc6es97mf904lw4okwjzv8j"
               :init="init"
               :initial-value="initialValue"
               v-model="value"/>
</template>


<style scoped lang="scss">

</style>
