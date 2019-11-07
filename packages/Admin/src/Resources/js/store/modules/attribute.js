import axios from "axios";

const state = {
    attributes: [],
    attribute: {
        name: ""
    }
};

const getters = {
    getAllAttributes: state => state.attributes,
    getSingleAttribute: state => state.attribute
};

const actions = {
    async fetchListAttributes({ commit }, paged = null) {
        let query = paged !== null ? `?page=${paged}` : "";
        let response = await axios.get(`${urlApi}attribute${query}`);

        commit("SHOW_LIST_ATTRIBUTES", response.data);
        commit("SET_META_DATA", response.data, { root: true });
    },
    async storeAttribute({ commit }, data) {
        try {
            const response = await axios.post(`${urlApi}attribute`, data);

            commit("NEW_ATTRIBUTE", response.data);
            commit("RESET_NEW_ATTRIBUTE");
            commit("SET_ERRORS", {});
        } catch (e) {
            commit("SET_ERRORS", e.response.data.errors);
        }
    },
    async updateAttribute({ commit, rootState }, data) {
        try {
            const response = await axios.put(
                `${urlApi}attribute/${data.id}`,
                data
            );

            commit("PUT_ATTRIBUTE", response.data);
            commit("RESET_NEW_ATTRIBUTE");
            $("#addNew").modal("hide");
            rootState.editMode = false;

            commit("SET_ERRORS", {});
        } catch (e) {
            commit("SET_ERRORS", e.response.data.errors);
        }
    },
    setAttribute({ commit }, oldAttribute) {
        commit("SET_ATTRIBUTE", oldAttribute);
    },
    resetAttribute({ commit }) {
        $("#addNew").on("hide.bs.modal", function(e) {
            commit("RESET_NEW_ATTRIBUTE");
        });
    }
};

const mutations = {
    SHOW_LIST_ATTRIBUTES: (state, data) => {
        state.attributes = data.data;
    },
    NEW_ATTRIBUTE: (state, data) => {
        state.attributes.unshift(data);
    },
    PUT_ATTRIBUTE: (state, data) => {
        const index = state.attributes.findIndex(
            attribute => attribute.id === data.id
        );
        if (index !== -1) {
            state.attributes.splice(index, 1, data);
        }
    },
    SET_ATTRIBUTE: (state, oldAttribute) => {
        state.attribute = oldAttribute;
    },
    RESET_NEW_ATTRIBUTE: state => {
        state.attribute = {
            name: ""
        };
    }
};

export default {
    state,
    getters,
    actions,
    mutations
};
