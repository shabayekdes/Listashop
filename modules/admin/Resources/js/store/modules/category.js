import axios from "axios";

const state = {
    categories: [],
    category: {
        id: "",
        name: "",
        slug: "",
        image: ""
    }
};

const getters = {
    getAllCategories: state => state.categories,
    getNewCategory: state => state.category
};

const actions = {
    async fetchListCategories({ commit }, paged = null) {
        let response = "";
        if (paged == "all") {
            response = await axios.get(`${urlApi}category?show=all`);
        } else {
            let query = paged !== null ? `?page=${paged}` : "";
            response = await axios.get(`${urlApi}category${query}`);
            commit("setMetaData", response.data, { root: true });
        }

        commit("showListCategories", response.data);
    },
    async storeCategory({ commit }, data) {
        try {
            const response = await axios.post(`${urlApi}category`, data);

            commit("newCategory", response.data);
            commit("resetNewCategory");
            commit("resetImage");
            commit("setErrors", {});
        } catch (e) {
            commit("setErrors", e.response.data.errors);
        }
    },
    async updateCategory({ commit }, data) {
        try {
            const response = await axios.put(
                `${urlApi}category/${data.id}`,
                data
            );

            

            commit("putCategory", response.data);
            commit("resetNewCategory");
            commit("resetImage");

            commit("setErrors", {});
            $("#addNew").modal("hide");
        } catch (e) {
            commit("setErrors", e.response.data.errors);
        }
    },
    async deleteCategory({ commit }, id) {
        await axios.delete(`${urlApi}category/${id}`);
        commit("removeCategory", id);
    },

    setCategory({ commit }, oldCategory) {
        commit("setCategory", oldCategory);
        if (oldCategory.image != null) {
            commit(
                "setImage",
                {
                    name: oldCategory.image,
                    url: "/img/category/" + oldCategory.image
                },
                { root: true }
            );
        }
    },
    resetCategory({ commit }) {
        $("#addNew").on("hide.bs.modal", function(e) {
            commit("resetNewCategory");
            commit("resetImage");
        });
    }
};

const mutations = {
    showListCategories: (state, data) => {
        state.categories = data.data;
    },
    newCategory: (state, data) => {
        state.categories.unshift(data);
    },
    putCategory: (state, data) => {
        const index = state.categories.findIndex(
            category => category.id === data.id
        );
        if (index !== -1) {
            state.categories.splice(index, 1, data);
        }
    },
    removeCategory: (state, id) =>
        (state.categories = state.categories.filter(
            category => category.id !== id
        )),
    setCategory: (state, oldCategory) => {
        state.category = oldCategory;
    },
    resetNewCategory: state => {
        state.category = {
            name: "",
            slug: "",
            image: ""
        };
    }
};

export default {
    state,
    getters,
    actions,
    mutations
};
