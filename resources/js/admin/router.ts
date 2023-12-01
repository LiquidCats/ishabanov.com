import {createRouter, createWebHistory} from "vue-router";
import PostList from "./pages/posts/PostList.vue";
import PostEdit from "./pages/posts/PostEditor.vue";
import RouteNames from "./enums/RouteNames";
import Tags from "./pages/tags/Tags.vue";
import Files from "./pages/files/Files.vue";

const router =  createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/admin',
            alias: '/admin/dashboard',
            component: null,
            name: RouteNames.DASHBOARD,
            children: [],
        },
        {
            path: '/admin/posts',
            component: PostList,
            name: RouteNames.POST_LIST,
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
            component: Tags,
            name: RouteNames.TAG_LIST,
            children: [],
        },
        {
            path: '/admin/files',
            component: Files,
            name: RouteNames.FILES_LIST,
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
