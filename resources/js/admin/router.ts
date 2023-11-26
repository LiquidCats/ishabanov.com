import {createRouter, createWebHistory} from "vue-router";
import PostList from "./pages/posts/PostList.vue";
import PostEdit from "./pages/posts/PostEditor.vue";
import RouteNames from "./enums/RouteNames";

const router =  createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/admin',
            alias: '/admin/dashboard',
            component: null,
            children: [],
        },
        {
            path: '/admin/posts',
            component: PostList,
            children: []
        },

        {
            path: '/admin/posts/create',
            component: PostEdit,
            name: RouteNames.POST_CREATE,
            children: [],
        },
        {
            path: '/admin/posts/:post_id(\\d+)/edit',
            component: PostEdit,
            name: RouteNames.POST_EDIT,
            children: [],
        },
        {
            path: '/admin/tags',
            component: null,
            children: [],
        },
        {
            path: '/admin/files',
            component: null,
            children: [],
        },
        {
            path: '/admin/users',
            component: null,
            children: [],
        },
        {
            path: '/admin/settings',
            component: null,
            children: [],
        }
    ],
})

export default router
