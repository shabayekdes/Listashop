import axios from "axios";
import router from "@Admin/router";
import swal from 'sweetalert2';

const state = {
    options: [],
    option: {
        id: "",
        name: "",
        type: ""
    },
    optionValues: [],
    selectedOptions: []
};

const getters = {
    getAllOptions: state => state.options,
    getSingleOption: state => state.option,
    getAllOptionValues: state => state.optionValues,
    getSelectedOptions: state => state.selectedOptions
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
            router.push("/admin/options");

            commit("SET_ERRORS", {});
        } catch (e) {
            commit("SET_ERRORS", e.response.data.errors);
        }
    },
    async showOption({ commit }, id) {
        try {
            const response = await axios.get(`${urlApi}option/${id}`);

            commit("SET_OPTION", response.data.data);
        } catch (e) {
            router.push("/admin/404");
        }
    },
    async deleteOptionValue({ commit }, value) {
        await axios.delete(`${urlApi}option-value/${value.id}`);

        swal.fire(
            'Deleted!',
            'Information has been deleted.',
            'success'
            )
        commit("REMOVE_OPTION_VALUE", value);
    },
    addSelectedOptions({ commit }, value) {
        commit("NEW_SELECTED_OPTIONS", value);
    },
    removeSelectedOption({ commit }, option) {
        commit("REMOVE_SELECTED_OPTION", option);
    },
    removeSelectedOptionValue({ commit }, value) {
        commit("REMOVE_SELECTED_OPTION_VALUE", value);
    },
    addOptionVal({ commit }, value) {
        commit("NEW_OPTION_VAL", value);
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
    SET_OPTION: (state, data) => {
        state.option = data;
        state.optionValues = data.values;
    },
    RESET_NEW_OPTION: state => {
        state.option = {
            id: "",
            name: "",
            type: ""
        };
        state.optionValues = [];
    },
    NEW_SELECTED_OPTIONS: (state, value) => {
        state.selectedOptions.unshift(value);
    },
    NEW_OPTION_VAL: (state, value) => {
        state.optionValues.unshift(value);
    },
    REMOVE_OPTION_VALUE: (state, value) => {
        state.optionValues.splice(state.optionValues.indexOf(value), 1);
    },
    REMOVE_SELECTED_OPTION_VALUE: (state, data) => {

        state.selectedOptions = state.selectedOptions.filter(option => {
            let index = option.values.findIndex(value => value.id === data.id);
            if (index !== -1) {
                option.values.splice(index, 1);
                
            }
            return true;
        });
    },
    REMOVE_SELECTED_OPTION: (state, value) => {
        state.selectedOptions.splice(state.selectedOptions.indexOf(value), 1);
    }
};

export default {
    state,
    getters,
    actions,
    mutations
};
