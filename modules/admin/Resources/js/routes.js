import Dashboard from "./pages/dashboard/Dashboard.vue";

import Users from "./pages/user/User.vue";

import NotFound from "./views/NotFound.vue";

export const routes = [
    {
        path: "/admin",
        name: "dashboard",
        component: Dashboard
    },
    {
        path: "/admin/users",
        name: "users.index",
        component: Users
    },
    {
        path: "/admin/*",
        component: NotFound
    }
];
