import {Router} from "vue-router";

export default function navigation(router: Router): void {
    const links = document.querySelectorAll('.sidenav > li')
    for (const link of links) {
        const isBackendDriven = link.attributes.getNamedItem('backend-driven')

        const anchor = link.querySelector('a')
        const route = anchor.attributes?.getNamedItem('href')?.value

        if (!isBackendDriven) {
            link.addEventListener('click', e => {
                e.preventDefault()

                route && router?.push(route)
            })
        }
    }

}
