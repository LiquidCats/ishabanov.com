import {createPinia} from "pinia";
import {createApp} from "vue";
import router from "./router";
//
import App from "./components/pages/App.vue";

const pinia = createPinia()
const app = createApp(App)

app.use(pinia)
app.use(router)

app.mount('#app-home')
