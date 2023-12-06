import {nextTick} from "vue";
import {createRouter, createWebHistory} from "vue-router";
//
import PostList from "./pages/posts/PostList.vue";
import PostEdit from "./pages/posts/PostEditor.vue";
import RouteNames from "./enums/RouteNames";
import Tags from "./pages/tags/Tags.vue";
import Files from "./pages/files/Files.vue";
import Dashboard from "./pages/dashboard/Dashboard.vue";

const router =  createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/admin',
            alias: '/admin/dashboard',
            component: Dashboard,
            name: RouteNames.DASHBOARD,
            children: [],
            meta: {
                title: 'Dashboard',
            }
        },
        {
            path: '/admin/posts',
            component: PostList,
            name: RouteNames.POST_LIST,
            children: [],
            meta: {
                title: 'Posts',
            }
        },

        {
            path: '/admin/posts/create',
            component: PostEdit,
            name: RouteNames.POST_CREATE,
            children: [],
            meta: {
                title: 'Create Post',
            }
        },
        {
            path: '/admin/posts/:post_id(\\d+)/edit',
            component: PostEdit,
            name: RouteNames.POST_EDIT,
            children: [],
            meta: {
                title: 'Edit Post',
            }
        },
        {
            path: '/admin/tags',
            component: Tags,
            name: RouteNames.TAG_LIST,
            children: [],
            meta: {
                title: 'Tags',
            }
        },
        {
            path: '/admin/files',
            component: Files,
            name: RouteNames.FILES_LIST,
            children: [],
            meta: {
                title: 'Files',
            }
        },
        {
            path: '/admin/users',
            component: null,
            children: [],
            meta: {
                title: 'Users',
            }
        },
        {
            path: '/admin/settings',
            component: null,
            children: [],
            meta: {
                title: 'Settings',
            }
        }
    ],
})

const DEFAULT_TITLE = 'iShabanov Admin'
router.afterEach(async (to) => {
    await nextTick(() => {
        document.title = [DEFAULT_TITLE, to?.meta?.title].filter(Boolean).join(' - ')
    })
})
export default router
