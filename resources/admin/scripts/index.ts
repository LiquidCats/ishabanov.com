import {createApp} from "vue"
import {createPinia} from "pinia";
import Popper from "vue3-popper";
//
import App from "./pages/App.vue";
//
import router from "./router";
import navigation from "./navigation";

const pinia = createPinia()
const app = createApp(App)

app.component('Popper', Popper)

app.use(pinia)
app.use(router)

app.mount('#app')

navigation(router)


