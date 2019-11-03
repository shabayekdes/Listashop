import axios from "axios";

const state = {
    files: [],
    images: []
};

const getters = {
    getFiles: state => state.files,
    getImages: state => state.images
};

const actions = {
    addImage({ state }, file) {
        if (!file.type.match("image.*")) {
            return;
        }
        state.files.push(file);
        const img = new Image(),
            reader = new FileReader();

        reader.onload = e => state.images.push(e.target.result);
        reader.readAsDataURL(file);
    },
    getFileSize(size) {
        const fSExt = ["Bytes", "KB", "MB", "GB"];
        let i = 0;

        while (size > 900) {
            size /= 1024;
            i++;
        }
        return `${Math.round(size * 100) / 100} ${fSExt[i]}`;
    }
};

const mutations = {};

export default {
    state,
    getters,
    actions,
    mutations
};
