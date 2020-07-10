import axios from "axios";

const state = {
    settings: [],
    childSettings: [],
    setting: {}
};

const getters = {
    getAllSettings: state => state.settings,
    getSingleSetting: state => state.setting,
    getAllChildSettings: state => state.childSettings
};

const actions = {
    async fetchListSettings({ commit }, paged = null) {
        let query = paged !== null ? `?page=${paged}` : "";
        const response = await axios.get(`${urlApi}setting${query}`);

        commit("SHOW_LIST_SETTING", response.data);
        commit("SHOW_LIST_CHILDERN_SETTING");
        commit("SHOW_LIST_SETTINGS");
    },
    async updateSetting({ commit }, data) {
        try {
            const response = await axios.put(`${urlApi}setting`, data);

            commit("PUT_SETTING", response.data);

        } catch (e) {
            commit("SET_ERRORS", e.response.data.errors);
        }
    },
};

const mutations = {
    SHOW_LIST_SETTING: (state, data) => {
        state.settings = data.data;
    },
    SHOW_LIST_CHILDERN_SETTING: (state) => {
        const childSettingsArr = state.settings.map( (setting) => state.childSettings.concat(setting.children_setting_groups)  )
        state.childSettings = childSettingsArr.flat(1)
    },
    SHOW_LIST_SETTINGS: (state) => {
        const settingArrFlatten = state.childSettings.map( (childSettings) => childSettings.settings ).flat(1)
        if(settingArrFlatten.length > 0){
            settingArrFlatten.forEach( setting => {
                // console.log(setting)
                if(setting.value !== null){
                    state.setting[setting.setting_key] = setting.value
                }
            });
        }

    },
};

export default {
    state,
    getters,
    actions,
    mutations
};
