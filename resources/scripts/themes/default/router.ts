import {nextTick} from "vue";
import {createRouter, createWebHistory} from "vue-router";
import Home from "./components/pages/Home.vue";
import Posts from "./components/pages/Posts.vue";
import Article from "./components/pages/Article.vue";
import {RouteNames} from "./domain/enums/routes";

const router =  createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            component: Home,
            name: RouteNames.HOMEPAGE,
            children: [],
            meta: {
                title: 'Home',
            }
        },
        {
            path: '/posts',
            alias: '/blog',
            name: RouteNames.POST_LIST,
            component: Posts,
            meta: {
                title: 'Posts',
            },
            children: [
                {
                    path: 'page/:page(\\d+)',
                    name: RouteNames.POST_LIST_PAGE,
                    component: Posts,
                    meta: {
                        title: 'Posts',
                    }
                },
            ],
        },
        {
            path: '/posts/:postId(\\d+)',
            name: RouteNames.POST_ARTICLE,
            component: Article,
            meta: {
                title: 'Article',
            },
        },
    ],
})

const DEFAULT_TITLE = document.title
router.afterEach(async (to) => {
    await nextTick(() => {
        document.title = [DEFAULT_TITLE, to?.meta?.title].filter(Boolean).join(' - ')
    })
})
export default router
