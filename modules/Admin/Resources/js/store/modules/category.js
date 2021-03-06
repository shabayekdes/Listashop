import axios from "axios";

const state = {
    categories: [],
    category: {
        id: "",
        name: "",
        slug: "",
        parent_id: ""
    }
};

const getters = {
    getAllCategories: state => state.categories,
    getSingleCategory: state => state.category
};

const actions = {
    async fetchListCategories({ commit }, paged = null) {
        let response = "";
        if (paged == "all") {
            response = await axios.get(`${urlApi}category?show=all`);
        } else {
            let query = paged !== null ? `?page=${paged}` : "";
            response = await axios.get(`${urlApi}category${query}`);
            commit("SET_META_DATA", response.data, { root: true });
        }

        commit("SHOW_LIST_CATEGORIES", response.data);
    },
    async storeCategory({ commit, rootState }, data) {
        try {
            const config = {
                headers: {
                    "Content-Type": "multipart/form-data"
                }
            };
            const response = await axios.post(
                `${urlApi}category`,
                data,
                config
            );

            commit("NEW_CATEGORY", response.data);
            commit("RESET_NEW_CATEGORY");

            commit("SET_ERRORS", {});
            rootState.status = "ok";
        } catch (e) {
            commit("SET_ERRORS", e.response.data.errors);
        }
    },
    async updateCategory({ commit, rootState }, data) {
        try {
            const response = await axios.put(
                `${urlApi}category/${data.id}`,
                data
            );

            commit("PUT_CATEGORY", response.data);
            commit("RESET_NEW_CATEGORY");
            commit("SET_ERRORS", {});
            rootState.status = "ok";

            $("#addNew").modal("hide");
        } catch (e) {
            commit("SET_ERRORS", e.response.data.errors);
        }
    },
    async deleteCategory({ commit }, id) {
        await axios.delete(`${urlApi}category/${id}`);
        commit("REMOVE_CATEGORY", id);
    },

    setCategory({ commit }, oldCategory) {
        commit("SET_CATEGORY", oldCategory);
        if (oldCategory.image != null) {
            commit(
                "SET_IMAGE",
                {
                    name: oldCategory.image,
                    url: "/img/category/" + oldCategory.image
                },
                { root: true }
            );
        }
    },
    resetCategory({ commit, rootState }) {
        $("#addNew").on("hide.bs.modal", function(e) {
            commit("RESET_NEW_CATEGORY");
            commit("RESET_IMAGE");
            rootState.editMode = false;

            // commit("RESET_STATUS");
        });
    }
};

const mutations = {
    SHOW_LIST_CATEGORIES: (state, data) => {
        state.categories = data.data;
    },
    NEW_CATEGORY: (state, data) => {
        state.categories.unshift(data);
    },
    PUT_CATEGORY: (state, data) => {
        const index = state.categories.findIndex(
            category => category.id === data.id
        );
        if (index !== -1) {
            state.categories.splice(index, 1, data);
        }
    },
    REMOVE_CATEGORY: (state, id) =>
        (state.categories = state.categories.filter(
            category => category.id !== id
        )),
    SET_CATEGORY: (state, oldCategory) => {
        state.category = oldCategory;
    },
    RESET_NEW_CATEGORY: state => {
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
