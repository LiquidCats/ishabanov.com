import {createApp} from "vue"
import {createPinia} from "pinia";
import Popper from "vue3-popper";
import Draggable from "vuedraggable";
//
// @ts-ignore
import App from "@admin/components/pages/App.vue";
//
import router from "@admin/router";
import navigation from "@admin/navigation";

const pinia = createPinia()
const app = createApp(App)

app.component('Popper', Popper)
app.component('Draggable', Draggable)

app.use(pinia)
app.use(router)

app.mount('#app-admin')

navigation(router)


