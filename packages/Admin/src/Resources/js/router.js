import Vue from "vue";

import VueRouter from "vue-router";

Vue.use(VueRouter);

import Wrapper from "@Admin/layouts/Wrapper";

import Dashboard from "@Admin/pages/dashboard/Dashboard.vue";

import Users from "@Admin/pages/user/Users.vue";

import ListCategories from "@Admin/pages/category/List.vue";

import ListProducts from "@Admin/pages/product/List.vue";
import EditProduct from "@Admin/pages/product/Edit.vue";
import CreateProduct from "@Admin/pages/product/Create.vue";

import ListOrders from "@Admin/pages/order/List.vue";
import ViewOrder from "@Admin/pages/order/View.vue";

import ListAttributes from "@Admin/pages/attribute/List.vue";
import ShowAttribute from "@Admin/pages/attribute/Show.vue";

import ListOptions from "@Admin/pages/option/List.vue";
import EditOption from "@Admin/pages/option/Edit.vue";
import CreateOption from "@Admin/pages/option/Create.vue";

import NotFound from "@Admin/views/NotFound.vue";

const routes = [
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
                component: CreateProduct,
                props: true,
                meta: {
                    text: "New Product"
                }
            },
            {
                path: "product/edit/:id",
                name: "product.edit",
                component: EditProduct,
                props: true,
                meta: {
                    text: "Edit Product"
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
                path: "order/view/:id",
                name: "order.view",
                component: ViewOrder,
                props: true,
                meta: {
                    text: "View Order"
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
            },
            {
                path: "options",
                name: "option.index",
                component: ListOptions,
                meta: {
                    text: "Options"
                }
            },
            {
                path: "option/create",
                name: "option.create",
                component: CreateOption,
                meta: {
                    text: "Create Option"
                }
            },
            {
                path: "option/:id/edit",
                name: "option.edit",
                component: EditOption,
                meta: {
                    text: "Edit Option"
                }
            }
        ]
    },
    {
        path: "/admin/*",
        component: NotFound
    }
];

const router = new VueRouter({
    routes,
    mode: "history"
});

export default router;
