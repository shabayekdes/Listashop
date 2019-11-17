import axios from "axios";

const state = {
    attributes: [],
    options: [],
    attribute: {
        id: "",
        name: ""
    },
    option: {
        id: "",
        label: "",
        attribute_id: ""
    }
};

const getters = {
    getAllAttributes: state => state.attributes,
    getSingleAttribute: state => state.attribute,

    getAllOptions: state => state.options,
    getSingleOption: state => state.option
};

const actions = {
    async fetchListAttributes({ commit }, paged = null) {
        let response = "";
        if (paged == "all") {
            response = await axios.get(`${urlApi}attribute?show=all`);
        } else {
            let query = paged !== null ? `?page=${paged}` : "";
            response = await axios.get(`${urlApi}attribute${query}`);
            commit("SET_META_DATA", response.data, { root: true });
        }
        commit("SHOW_LIST_ATTRIBUTES", response.data);
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
    async showAttribute({ commit, state }, id) {
        try {
            const response = await axios.get(`${urlApi}attribute/${id}`);

            commit("SET_ATTRIBUTE", response.data.data);
            commit("SHOW_LIST_OPTIONS", response.data.data.options);
        } catch (e) {
            commit("SET_ERRORS", e.response.data.errors);
        }
    },
    async deleteAttribute({ commit }, id) {
        await axios.delete(`${urlApi}attribute/${id}`);
        commit("REMOVE_ATTRIBUTE", id);
    },
    setAttribute({ commit }, oldAttribute) {
        commit("SET_ATTRIBUTE", oldAttribute);
    },
    resetAttribute({ commit }) {
        $("#addNew").on("hide.bs.modal", function(e) {
            commit("RESET_NEW_ATTRIBUTE");
        });
    },
    // Attribute Options
    async storeOption({ commit }, data) {
        try {
            const response = await axios.post(
                `${urlApi}attribute-options/${data.attribute_id}`,
                data
            );

            commit("NEW_OPTION", response.data);
            commit("RESET_NEW_OPTION");
            commit("SET_ERRORS", {});
        } catch (e) {
            commit("SET_ERRORS", e.response.data.errors);
        }
    },
    async updateOption({ commit, rootState }, data) {
        try {
            const response = await axios.put(
                `${urlApi}attribute-options/${data.id}`,
                data
            );

            commit("PUT_OPTION", response.data);
            commit("RESET_NEW_OPTION");
            $("#addNew").modal("hide");
            rootState.editMode = false;

            commit("SET_ERRORS", {});
        } catch (e) {
            commit("SET_ERRORS", e.response.data.errors);
        }
    },
    async deleteOption({ commit }, id) {
        await axios.delete(`${urlApi}attribute-options/${id}`);
        commit("REMOVE_OPTION", id);
    },
    setOption({ commit }, oldOption) {
        commit("SET_OPTION", oldOption);
    },
    resetOption({ commit }) {
        $("#addNew").on("hide.bs.modal", function(e) {
            commit("RESET_NEW_OPTION");
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
    REMOVE_ATTRIBUTE: (state, id) =>
        (state.attributes = state.attributes.filter(attr => attr.id !== id)),
    SET_ATTRIBUTE: (state, oldAttribute) => {
        state.attribute = oldAttribute;
    },
    RESET_NEW_ATTRIBUTE: state => {
        state.attribute = {
            id: "",
            name: ""
        };
    },
    // Attribute Options
    SHOW_LIST_OPTIONS: (state, data) => {
        state.options = data;
    },
    NEW_OPTION: (state, data) => {
        state.options.unshift(data);
    },
    PUT_OPTION: (state, data) => {
        const index = state.options.findIndex(option => option.id === data.id);
        if (index !== -1) {
            state.options.splice(index, 1, data);
        }
    },
    REMOVE_OPTION: (state, id) =>
        (state.options = state.options.filter(option => option.id !== id)),
    SET_OPTION: (state, oldOption) => {
        state.option = oldOption;
    },
    RESET_NEW_OPTION: state => {
        state.option = {
            id: "",
            label: "",
            attribute_id: ""
        };
    }
};

export default {
    state,
    getters,
    actions,
    mutations
};
