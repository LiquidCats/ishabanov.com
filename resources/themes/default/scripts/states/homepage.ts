import {defineStore} from "pinia";
import {ExperienceResource, HomepageResource} from "../domain/types/api";
import HomepageApi from "../api/homepage";
import dayjs from "dayjs";

interface State {
    data: HomepageResource,
    status: {
        loading: boolean
        loaded: boolean
    }
}

interface Actions {
    loadHomepage(): Promise<void>;
}
const homepageKey = 'homepage'

const useHomepageState = defineStore<'app.homepage', State, any, Actions>('app.homepage', {
    state: () => ({
        years: dayjs().diff(dayjs('2015-11-25 00:00:00'), "years"),
        experiences: [],
        status: {
            loading: false,
            loaded: false,
        }
    }),
    actions: {
        async loadHomepage() {
            const rawData = localStorage.getItem(homepageKey)
            if (rawData) {
                this.data = JSON.parse(rawData)
                this.status.loaded = true
                this.status.loading = false

                return Promise.resolve()
            }
            this.status.loading = true;
            try {
                const response =  await HomepageApi.load()
                this.data = response.data

                localStorage.setItem(homepageKey, JSON.stringify(this.data))

                this.status.loaded = true
            } catch (e) {
                console.error(e)
                this.status.loaded = false
            } finally {
                this.status.loading = false
            }

        }
    }
})

export default useHomepageState
