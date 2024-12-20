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
        data: {
            "years": dayjs().diff(dayjs('2015-11-25 00:00:00'), "years"),
            "experiences":[{"id":6,"company_url":"https://coinspaid.com","company_logo":"images/experience/coinspaid.svg","position":"Senior Software Engineer","company_name":"CoinsPaid","tools":[{"name":"MySQL","type":"database"},{"name":"Redis","type":"database"},{"name":"Laravel","type":"framework"},{"name":"PHP","type":"language"},{"name":"RabbitMQ","type":"queue"},{"name":"Docker","type":"tool"},{"name":"GoLang","type":"language"}],"description":["Created a clustered derivation mechanism for cryptocurrency addresses.","Enhanced the security of internal services.","Improved the architecture of services using the Domain-Driven Design (DDD) approach."],"started_at":"2022-12-24 00:00:00","ended_at":null},{"id":5,"company_url":"https://it.everli.com","company_logo":"images/experience/everli.svg","position":"Senior Software Engineer","company_name":"Everli","tools":[{"name":"MySQL","type":"database"},{"name":"Redis","type":"database"},{"name":"Laravel","type":"framework"},{"name":"PHP","type":"language"},{"name":"RabbitMQ","type":"queue"},{"name":"Docker","type":"tool"},{"name":"GitHub Actions","type":"deploy"}],"description":["Improved and accelerated CI/CD pipelines, reducing the time to feature delivery.","Researched, described, and integrated a self-documented code approach, enhancing code quality, shortening the feature delivery timeline, and saving funds over the long term.","Developed a rolling update system for backend features.","Optimized data storage and enhanced the speed of the search engine."],"started_at":"2021-11-04 00:00:00","ended_at":"2022-12-24 00:00:00"},{"id":4,"company_url":"https://imusician.pro","company_logo":"images/experience/imusician.svg","position":"Senior Software Engineer","company_name":"iMusician","tools":[{"name":"PostgreSQL","type":"database"},{"name":"Redis","type":"database"},{"name":"Laravel","type":"framework"},{"name":"PHP","type":"language"},{"name":"Docker","type":"tool"},{"name":"Bitbucket Pipelines","type":"deploy"},{"name":"SQS","type":"queue"}],"description":["Developed a long-term plan for complex refactoring and enhancement of the backend using the Domain-Driven Design (DDD) approach.","Optimized and improved the CI/CD processes, resulting in reduced delivery times.","Integrated the Test-Driven Development (TDD) approach within the team, significantly increasing the quality of delivered features.","Created a music trends parser and aggregator for analytics, which the company now offers as a separate service."],"started_at":"2020-12-01 00:00:00","ended_at":"2021-11-04 00:00:00"},{"id":3,"company_url":"https://pointpay.io","company_logo":"images/experience/pointpay.svg","position":"Senior Software Engineer","company_name":"PointPay","tools":[{"name":"PostgreSQL","type":"database"},{"name":"Laravel","type":"framework"},{"name":"PHP","type":"language"},{"name":"Docker","type":"tool"},{"name":"kubernetes","type":"deploy"},{"name":"NodeJS","type":"language"},{"name":"GoLang","type":"language"},{"name":"Kafka","type":"queue"},{"name":"Crypto Nodes","type":"tool"},{"name":"Nginx","type":"tool"}],"description":["Developed a cryptocurrency payment gateway.","Outlined the principles of building and creating microservices across the entire company.","Developed and implemented internal infrastructure.","Integrated tests within CI/CD pipelines.","Optimized build and deployment processes."],"started_at":"2019-12-01 00:00:00","ended_at":"2020-12-01 00:00:00"},{"id":2,"company_url":"https://hemmersbach.com","company_logo":"images/experience/hemmersbach.svg","position":"Middle Software Developer","company_name":"Hemmersbach","tools":[{"name":"Redis","type":"database"},{"name":"Laravel","type":"framework"},{"name":"PHP","type":"language"},{"name":"JavaScript","type":"language"},{"name":"RabbitMQ","type":"queue"},{"name":"Docker","type":"tool"},{"name":"MSSQL","type":"database"},{"name":"React","type":"framework"}],"description":["Contributed to a team that was among the first to implement Domain-Driven Design (DDD) in PHP.","Developed a rule-based permissions system and participated in the creation of a system that filters data and hides UI elements based on rules.","Introduced best practices and structured the approach to front-end development within the company based on these practices."],"started_at":"2017-12-01 00:00:00","ended_at":"2019-12-01 00:00:00"},{"id":1,"company_url":"https://school2100.com","company_logo":"images/experience/school2100.svg","position":"Junior Software Developer","company_name":"School2100","tools":[{"name":"MySQL","type":"database"},{"name":"PHP","type":"language"},{"name":"JavaScript","type":"language"},{"name":"Vue","type":"framework"}],"description":["Created the backend for a remote education system.","Developed a frontend for the back-office operations of the remote education system."],"started_at":"2016-12-01 00:00:00","ended_at":"2017-12-01 00:00:00"}]
        },
        status: {
            loading: false,
            loaded: false,
        }
    }),
    actions: {
        async loadHomepage() {
            return Promise.resolve()
            // const rawData = localStorage.getItem(homepageKey)
            // if (rawData) {
            //     this.data = JSON.parse(rawData)
            //     this.status.loaded = true
            //     this.status.loading = false
            //
            //     return Promise.resolve()
            // }
            // this.status.loading = true;
            // try {
            //     const response =  await HomepageApi.load()
            //     this.data = response.data
            //
            //     localStorage.setItem(homepageKey, JSON.stringify(this.data))
            //
            //     this.status.loaded = true
            // } catch (e) {
            //     console.error(e)
            //     this.status.loaded = false
            // } finally {
            //     this.status.loading = false
            // }
        }
    }
})

export default useHomepageState
