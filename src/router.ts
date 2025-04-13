import {nextTick} from "vue";
import {createRouter, createWebHistory} from "vue-router";
import {AppRoutes} from "@/enums/routes.ts";
import Home from "@/pages/public/pages/Home.vue";
import Posts from "@/pages/public/pages/Posts.vue";
import Article from "@/pages/public/pages/Article.vue";
import Layout from "@/pages/public/Layout.vue";

const router =  createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            component: Layout,
            children: [
                {
                    path: "",
                    alias: "/homepage",
                    component: Home,
                    name: AppRoutes.HOMEPAGE,
                    meta: {
                        title: 'Home',
                    }
                },
                {
                    path: '/posts',
                    alias: '/blog',
                    name: AppRoutes.POST_LIST,
                    component: Posts,
                    meta: {
                        title: 'Posts',
                    },
                    children: [
                        {
                            path: 'page/:page(\\d+)',
                            name: AppRoutes.POST_LIST_PAGE,
                            component: Posts,
                            meta: {
                                title: 'Posts',
                            }
                        },
                    ],
                },
                {
                    path: '/posts/:postId(\\d+)',
                    name: AppRoutes.POST_ARTICLE,
                    component: Article,
                    meta: {
                        title: 'Article',
                    },
                },
            ],
        },
        {
            path: '/admin',
            component: null,
            name: "admin",
            children: [],
            meta: {
                title: 'Admin',
            }
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