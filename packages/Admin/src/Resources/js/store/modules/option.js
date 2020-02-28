import axios from "axios";

const state = {
    options: []
};

const getters = {
    getAllOptions: state => state.options
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
    }
};

const mutations = {
    SHOW_LIST_OPTIONS: (state, data) => {
        state.options = data.data;
    }
};

export default {
    state,
    getters,
    actions,
    mutations
};
