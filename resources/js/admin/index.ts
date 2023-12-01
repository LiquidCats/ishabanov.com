import "bootstrap"
//
import {createApp} from "vue"
import {RouterView} from "vue-router";
import {createPinia} from "pinia";
import Popper from "vue3-popper";
//
import router from "./router";
import navigation from "./navigation";

const pinia = createPinia()
const app = createApp(RouterView)

app.component('Popper', Popper)

app.use(pinia)
app.use(router)

app.mount('#app')

navigation(router)


