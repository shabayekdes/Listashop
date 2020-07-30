<template>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Upload Galley</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
            </button>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="col-md-4 offset-md-4">
            <img
            class="img-thumbnail mx-auto"
            width="200"
            height="200"
            src="/img/img-placeholder.png"
            alt="user image"
            v-show="!getImages.length"
            />
        </div>
        <div
            id="carouselExampleIndicators"
            class="carousel slide"
            data-ride="carousel"
            v-show="getImages.length"
        >
            <ol class="carousel-indicators">
            <li
                data-target="#carouselExampleIndicators"
                v-for="(image, index) in getImages"
                :key="index"
                :class="{ 'active': index === 0 }"
                :data-slide-to="index"
            ></li>
            </ol>
            <div class="carousel-inner">
            <div
                class="carousel-item"
                v-for="(image, index) in getImages"
                :key="index"
                :class="{ 'active': index === 0 }"
            >
                <img class="d-block w-100" :src="image" :alt="`Image Uplaoder ${index}`" />
            </div>
            </div>
            <a
            class="carousel-control-prev"
            href="#carouselExampleIndicators"
            role="button"
            data-slide="prev"
            >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a
            class="carousel-control-next"
            href="#carouselExampleIndicators"
            role="button"
            data-slide="next"
            >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
    <a class="btn btn-default btn-block" @click="newModel" href="#">
        <i class="fas fa-cloud-upload-alt"></i>
        Upload
    </a>
    </div>
    <!-- Modal -->
    <model title="Media uploader" size="modal-xl">
      <image-uploader></image-uploader>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </model>
</div>
</template>

<script>
import { mapGetters, mapActions, mapMutations } from "vuex";
import Model from "@Admin/components/Model.vue";
import ImageUploader from "@Admin/views/ImageUploader";

export default {
    name: "UploadGalley",
    components: {
        ImageUploader,
        Model
    },
    methods: {
        newModel() {
            $("#addNew").modal("show");
        }
    },
    computed: mapGetters([
        "getImages"
    ]),
}
</script>

<style>

</style>