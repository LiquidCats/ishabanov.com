import {Router} from "vue-router";

export default function navigation(router: Router): void {
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

}
