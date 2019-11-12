import Wrapper from "@Admin/layouts/Wrapper";

import Dashboard from "@Admin/pages/dashboard/Dashboard.vue";

import Users from "@Admin/pages/user/Users.vue";

import ListCategories from "@Admin/pages/category/List.vue";

import ListProducts from "@Admin/pages/product/List.vue";
import EditProducts from "@Admin/pages/product/Edit.vue";

import ListOrders from "@Admin/pages/order/List.vue";

import ListAttributes from "@Admin/pages/attribute/List.vue";
import ShowAttribute from "@Admin/pages/attribute/Show.vue";

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
                path: "users",
                name: "users.index",
                component: Users,
                meta: {
                    text: "Users"
                }
            },
            {
                path: "categories",
                name: "Categories.index",
                component: ListCategories,
                meta: {
                    text: "Categories"
                }
            },
            {
                path: "products",
                name: "Products.index",
                component: ListProducts,
                meta: {
                    text: "Products"
                }
            },
            {
                path: "product/create",
                name: "product.create",
                component: EditProducts,
                props: true,
                meta: {
                    text: "New Product"
                }
            },
            {
                path: "orders",
                name: "order.index",
                component: ListOrders,
                meta: {
                    text: "Orders"
                }
            },
            {
                path: "attributes",
                name: "attribute.index",
                component: ListAttributes,
                meta: {
                    text: "Attributes"
                }
            },
            {
                path: "attribute/:id",
                name: "attribute.show",
                component: ShowAttribute,
                meta: {
                    text: "Attributes"
                }
            }
        ]
    },
    {
        path: "/admin/*",
        component: NotFound
    }
];
