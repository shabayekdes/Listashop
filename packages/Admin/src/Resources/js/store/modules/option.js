import axios from "axios";

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
    async storeOption({ commit }, data) {
        try {
            const response = await axios.post(`${urlApi}option`, data);

            console.log(data);
            commit("NEW_OPTION", response.data);
            // commit("RESET_NEW_OPTION");
            commit("SET_ERRORS", {});
        } catch (e) {
            commit("SET_ERRORS", e.response.data.errors);
        }
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
