import {nextTick} from "vue";
import {createRouter, createWebHistory} from "vue-router";
//
import {
    ChatBubbleLeftRightIcon,
    TagIcon,
    ArchiveBoxIcon,
    PresentationChartBarIcon,
    UsersIcon,
} from "@heroicons/vue/24/outline";
//
import PostList from "./components/pages/PostList.vue";
import PostEdit from "./components/pages/PostEditor.vue";
import RouteNames from "./enums/RouteNames";
import Tags from "./components/pages/Tags.vue";
import Files from "./components/pages/Files.vue";
import Dashboard from "./components/pages/Dashboard.vue";
import Users from "./components/pages/UserList.vue";
import UserCreator from "./components/pages/UserCreator.vue";
import UserUpdater from "./components/pages/UserUpdater.vue";

const router =  createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/admin/dashboard',
            alias: '/admin',
            component: Dashboard,
            name: RouteNames.DASHBOARD,
            children: [],
            meta: {
                isPrimary: true,
                title: 'Home',
                icon: PresentationChartBarIcon
            }
        },
        {
            path: '/admin/posts',
            component: PostList,
            name: RouteNames.POST_LIST,
            meta: {
                title: 'Posts',
                isPrimary: true,
                icon: ChatBubbleLeftRightIcon
            },
            children: [
                {
                    path: ':page(\\d+)',
                    component: PostList,
                    name: RouteNames.POST_LIST_PAGE,
                    meta: {
                        title: 'Posts',
                    }
                },
            ],
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
                isPrimary: true,
                icon: TagIcon
            }
        },
        {
            path: '/admin/files',
            component: Files,
            name: RouteNames.FILES_LIST,
            children: [],
            meta: {
                title: 'Files',
                isPrimary: true,
                icon: ArchiveBoxIcon
            }
        },
        {
            path: '/admin/users',
            component: Users,
            name: RouteNames.USERS_LIST,
            children: [],
            meta: {
                title: 'Users',
                isPrimary: true,
                icon: UsersIcon,
            }
        },
        {
            path: '/admin/users/create',
            component: UserCreator,
            name: RouteNames.USERS_CREATE,
            children: [],
            meta: {
                title: 'Create User',
            }
        },
        {
            path: '/admin/users/:user_id(\\d+)/edit',
            component: UserUpdater,
            name: RouteNames.USERS_EDIT,
            children: [],
            meta: {
                title: 'Edit User',
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

const DEFAULT_TITLE = document.title
router.afterEach(async (to) => {
    await nextTick(() => {
        document.title = [DEFAULT_TITLE, to?.meta?.title].filter(Boolean).join(' - ')
    })
})
export default router
