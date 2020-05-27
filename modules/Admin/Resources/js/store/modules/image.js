const state = {
    files: [],
    images: [],
    thumb: {
        name: "Choose Image ...",
        url: "/img/img-placeholder.png",
        file: ""
    }
};

const getters = {
    getFiles: state => state.files,
    getImages: state => state.images,
    getThumb: state => state.thumb
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
    },
    addThumb({ state }, e) {
        let file = e.target.files[0];
        let reader = new FileReader();
        let limit = 1024 * 1024 * 2;
        if (file["size"] > limit) {
            return false;
        }
        reader.onloadend = f => {
            state.thumb.name = file.name;
            state.thumb.url = reader.result;
            state.thumb.file = file;
        };
        reader.readAsDataURL(file);
    },
    setImage({ commit }, data) {
        commit("SET_IMAGE", data);
    },
    resetImages({ state }) {
        state.files = [];
        state.images = [];
        state.thumb = {
            name: "Choose Image ...",
            url: "/img/img-placeholder.png",
            file: ""
        };
    }
};

const mutations = {
    SET_IMAGE: (state, image) => {
        state.thumb = image;
    }
};

export default {
    state,
    getters,
    actions,
    mutations
};
