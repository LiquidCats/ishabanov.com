import {defineStore} from "pinia";
import {Link} from "../domain/types/link";
import dayjs from "dayjs";
import {SparklesIcon, CodeBracketIcon, EnvelopeIcon, HomeIcon, PencilSquareIcon} from "@heroicons/vue/24/outline";
import {RouteNames} from "../domain/enums/routes";

interface State {
    socials: Array<Link>
    menu: Array<Link>
}

const useSettingsState = defineStore<string, State, any, any>('app.settings', {
    state: () => ({
        socials: [
            {
                icon: SparklesIcon,
                link: 'https://www.linkedin.com/in/ilia-shabanov',
                text: 'LinkedIn',
            },
            {
                icon: CodeBracketIcon,
                link: 'https://github.com/LiquidCats',
                text: 'GitHub',
            },
            {
                icon: EnvelopeIcon,
                link: 'mailto:ishabanov@liquid-cat.com',
                text: 'Mail',
            },
        ],
        menu: [
            {
                icon: HomeIcon,
                link: RouteNames.HOMEPAGE,
                text: 'Home',
            },
            {
                icon: PencilSquareIcon,
                link: RouteNames.POST_LIST,
                text: 'Posts',
            },
        ],
    })
})

export default useSettingsState
