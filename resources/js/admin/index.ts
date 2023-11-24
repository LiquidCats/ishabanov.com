import {createApp} from "vue"
import {RouterView} from "vue-router";
import Popper from "vue3-popper";
//
import router from "./router";
import {createPinia} from "pinia";

const pinia = createPinia()
const app = createApp(RouterView)

app.component('Popper', Popper)

app.use(pinia)
app.use(router)

app.mount('#app')








const links = document.querySelectorAll('.sidebar-link')
const handler = (e: Event) => {
    e.preventDefault()
    e.stopPropagation()

    const elem  = e.target as HTMLLinkElement
    const elAttr = elem.attributes as NamedNodeMap

    if (elem) {
        const route = elAttr.getNamedItem('href')?.value
        if (route) {
            router?.push(route)
        }
    }
}
for (const link of links) {
    link.addEventListener('click', handler)
}



