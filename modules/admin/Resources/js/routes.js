import Dashboard from "./pages/dashboard/Dashboard.vue";

import Users from "./pages/user/Users.vue";
import Categories from "./pages/category/Categories.vue";

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
        path: "/admin/categories",
        name: "Categories.index",
        component: Categories
    },
    {
        path: "/admin/*",
        component: NotFound
    }
];
