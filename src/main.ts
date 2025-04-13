import './style.css'
//
import { createApp } from 'vue'
import { createPinia } from 'pinia'
import dayjs from "dayjs";
import relativeTime from "dayjs/plugin/relativeTime";
import App from '@/App.vue'
//
import router from "@/router.ts";

const pinia = createPinia()

const app = createApp(App)


dayjs.locale('en')
dayjs.extend(relativeTime);

app.use(pinia)
app.use(router)

app.mount('#app')
