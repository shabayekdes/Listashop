import axios from "axios";
import router from "@Admin/router";

const state = {
    options: [],
    option: {
        id: "",
        name: "",
        type: ""
    },
    optionValues: []
};

const getters = {
    getAllOptions: state => state.options,
    getSingleOption: state => state.option,
    getAllOptionValues: state => state.optionValues
};

const actions = {
    async fetchListOptions({ commit }, paged = null) {
        let response = "";
        if (paged == "all") {
            response = await axios.get(`${urlApi}option?show=all`);
        } else {
            let query = paged !== null ? `?page=${paged}` : "";
            response = await axios.get(`${urlApi}option${query}`);
            commit("SET_META_DATA", response.data, { root: true });
        }
        commit("SHOW_LIST_OPTIONS", response.data);
    },
    async storeOption({ commit, rootState }, data) {
        try {
            const response = await axios.post(`${urlApi}option`, data);

            console.log(response);

            commit("NEW_OPTION", response.data);
            commit("RESET_NEW_OPTION");
            commit("SET_ERRORS", {});
            router.push("/admin/options");

            // rootState.status = "ok";
        } catch (e) {
            commit("SET_ERRORS", e.response.data.errors);
        }
    },
    async updateOption({ commit, rootState }, data) {
        try {
            const response = await axios.put(
                `${urlApi}option/${data.id}`,
                data
            );
            // console.log(response.data.option);
            commit("PUT_OPTION", response.data.option);
            commit("RESET_NEW_OPTION");
            rootState.editMode = false;
            rootState.status = "ok";

            commit("SET_ERRORS", {});
        } catch (e) {
            commit("SET_ERRORS", e.response.data.errors);
        }
    },
    async showOption({ commit }, id) {
        const response = await axios.get(`${urlApi}option/${id}`);

        commit("SET_OPTION", response.data);
    },
    addSelectedOptionVal({ commit }, value) {
        commit("NEW_SELECTED_OPTION_VAL", value);
    }
};

const mutations = {
    SHOW_LIST_OPTIONS: (state, data) => {
        state.options = data.data;
    },
    NEW_OPTION: (state, data) => {
        state.options.unshift(data);
    },
    PUT_OPTION: (state, data) => {
        // console.log(data);
        const index = state.options.findIndex(option => option.id === data.id);
        if (index !== -1) {
            state.options.splice(index, 1, data);
        }
    },
    SET_OPTION: (state, old) => {
        state.option = old.option;
        state.optionValues = old.values;
    },
    RESET_NEW_OPTION: state => {
        state.option = {
            id: "",
            name: "",
            type: ""
        };
        state.optionValues = [];
    },
    NEW_SELECTED_OPTION_VAL: (state, value) => {
        state.optionValues.unshift(value);
    },
    REMOVE_OPTION_VALUE: (state, value) => {
        state.optionValues.splice(state.optionValues.indexOf(value), 1);
    }
};

export default {
    state,
    getters,
    actions,
    mutations
};
