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

        commit("SHOW_LIST_USERS", response.data);
        commit("SET_META_DATA", response.data, { root: true });
    }
};

const mutations = {
    SHOW_LIST_USERS: (state, data) => {
        state.users = data.data;
    }
};

export default {
    state,
    getters,
    actions,
    mutations
};
