import axios from "axios";

const state = {
    users: []
};

const getters = {
    getAllUsers: state => state.users
};

const actions = {
    async fetchListUsers({ commit }, paged = null) {
        let query = paged !== null ? `?page=${paged}` : "";
        const response = await axios.get(`${urlApi}user${query}`);

        commit("showListUsers", response.data);
        commit("setMetaData", response.data, { root: true });
    }
};

const mutations = {
    showListUsers: (state, data) => {
        state.users = data;
    }
};

export default {
    state,
    getters,
    actions,
    mutations
};
