import {nextTick} from "vue";
import {createRouter, createWebHistory} from "vue-router";
import Home from "./components/pages/Home.vue";

const router =  createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            component: Home,
            name: "Home",
            children: [],
            meta: {
                title: 'Home',
            }
        },
        {
            path: '/posts',
            name: 'Posts',
            component: null,
            meta: {
                title: 'Posts',
            },
            children: [
                {
                    path: ':postId',
                    name: 'Article',
                    component: null,
                    meta: {
                        title: 'Article',
                    }
                },
            ],
        },
        {
            path: '/about',
            name: 'About',
            component: null,
            meta: {
                title: 'About',
            }
        }
    ],
})

const DEFAULT_TITLE = 'Ilya Shabanov - Software Engineer'
router.afterEach(async (to) => {
    await nextTick(() => {
        document.title = [DEFAULT_TITLE, to?.meta?.title].filter(Boolean).join(' - ')
    })
})
export default router
