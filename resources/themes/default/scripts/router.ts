import {nextTick} from "vue";
import {createRouter, createWebHistory} from "vue-router";
import Home from "./components/pages/Home.vue";

const router =  createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            component: Home,
            name: "home",
            children: [],
            meta: {
                title: 'Home',
            }
        },
        {
            path: '/posts',
            name: 'posts',
            component: null,
            meta: {
                title: 'Posts',
            },
            children: [
                {
                    path: 'page/:page(\\d+)',
                    name: 'post.page',
                    component: null,
                    meta: {
                        title: 'Posts',
                    }
                },
            ],
        },
        {
            path: '/posts/:postId(\\d+)',
            name: 'post.article',
            component: null,
            meta: {
                title: 'Article',
            },
        },
    ],
})

const DEFAULT_TITLE = 'Ilia Shabanov - Software Engineer'
router.afterEach(async (to) => {
    await nextTick(() => {
        document.title = [DEFAULT_TITLE, to?.meta?.title].filter(Boolean).join(' - ')
    })
})
export default router
