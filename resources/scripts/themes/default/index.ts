import {createPinia} from "pinia";
import {createApp} from "vue";
import dayjs from "dayjs";
import relativeTime from "dayjs/plugin/relativeTime";
//
import "./highlight";
import router from "./router";
//
import App from "./components/pages/App.vue";


const pinia = createPinia()
const app = createApp(App)

dayjs.locale('en')
dayjs.extend(relativeTime);

app.use(pinia)
app.use(router)

app.mount('#app-home')
