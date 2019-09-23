import Dashboard from "./pages/dashboard/Dashboard.vue";

import Users from "./pages/user/Users.vue";
import ListCategories from "./pages/category/Lists.vue";
import ListProducts from "./pages/product/Lists.vue";
import EditProducts from "./pages/product/Edit.vue";

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
        component: ListCategories
    },
    {
        path: "/admin/products",
        name: "Products.index",
        component: ListProducts
    },
    {
        path: "/admin/product/create",
        name: "product.create",
        component: EditProducts,
        props: true
    },
    {
        path: "/admin/*",
        component: NotFound
    }
];
