import Wrapper from "@Admin/layouts/Wrapper";

import Dashboard from "@Admin/pages/dashboard/Dashboard.vue";

import Users from "@Admin/pages/user/Users.vue";
import ListCategories from "@Admin/pages/category/Lists.vue";
import ListProducts from "@Admin/pages/product/Lists.vue";
import EditProducts from "@Admin/pages/product/Edit.vue";

import NotFound from "@Admin/views/NotFound.vue";

export const routes = [
    {
        path: "/admin",
        component: Wrapper,
        meta: {
            text: "Admin"
        },
        children: [
            {
                path: "",
                name: "dashboard",
                component: Dashboard,
                meta: {
                    text: "Dashboard"
                }
            },
            {
                path: "/admin/users",
                name: "users.index",
                component: Users,
                meta: {
                    text: "Users"
                }
            },
            {
                path: "/admin/categories",
                name: "Categories.index",
                component: ListCategories,
                meta: {
                    text: "Categories"
                }
            },
            {
                path: "/admin/products",
                name: "Products.index",
                component: ListProducts,
                meta: {
                    text: "Products"
                }
            },
            {
                path: "/admin/product/create",
                name: "product.create",
                component: EditProducts,
                props: true,
                meta: {
                    text: "product"
                }
            }
        ]
    },
    {
        path: "/admin/*",
        component: NotFound
    }
];
