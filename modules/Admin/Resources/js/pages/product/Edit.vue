<template>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-9">
        <div class="card card-outline card-primary">
          <div class="card-body">
            <div class="form-group">
              <label for="inputName">Product Name</label>
              <input
                type="text"
                @change="setSlug"
                v-model="getSingleProduct.name"
                id="inputName"
                class="form-control"
                placeholder="Enter product name ..."
                :class="{ 'is-invalid': hasError('name') }"
              />
              <has-error field="name"></has-error>
            </div>
            <div class="form-group row">
              <div class="input-group col-sm-4">
                <div class="input-group-prepend">
                  <div class="input-group-text bg-primary color-palette">
                    <small>product/</small>
                  </div>
                </div>
                <input
                  type="text"
                  v-model="getSingleProduct.slug"
                  class="form-control"
                  id="inlineFormInputGroup"
                  placeholder="Link to product"
                  :class="{ 'is-invalid': hasError('slug') }"
                />
                <has-error field="slug"></has-error>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Details</h3>
          </div>
          <!-- /.card-header -->
          <product-simple />
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="card card-primary collapsed-card">
          <div class="card-header">
            <h3 class="card-title">Description</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="form-group">
              <label for="inputDescription">Description</label>
              <textarea
                id="inputDescription"
                class="form-control"
                rows="4"
                :class="{ 'is-invalid': hasError('description') }"
              ></textarea>
              <has-error field="description"></has-error>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

      <div class="col-md-3">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Publish</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <button
              type="button"
              @click="patchProduct"
              class="btn btn-block bg-gradient-success btn-lg"
            >Update</button>
          </div>
          <!-- /.card-body -->
        </div>

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Categories</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="form-group">
              <label>Select Category</label>
              <select
                v-model="getSingleProduct.category_id"
                name="category_id"
                id="category_id"
                class="custom-select"
                :class="{ 'is-invalid': hasError('category_id') }"
              >
                <option value disabled>Select Category</option>
                <option
                  v-for="category in getAllCategories"
                  :key="category.id"
                  :value="category.id"
                >{{ category.name }}</option>
              </select>
              <has-error field="category_id"></has-error>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Upload Thumbnail</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row mb-3">
              <div class="col-md-4 offset-md-4">
                <img
                  class="img-thumbnail mx-auto"
                  width="200"
                  height="200"
                  :src="getThumb.url"
                  alt="user image"
                />
              </div>
            </div>
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="custom-file">
                  <label
                    class="custom-file-label"
                    for="inputGroupFile02"
                    aria-describedby="inputGroupFileAddon02"
                  >{{ truncate(getThumb.name, 20) }}</label>
                  <input
                    type="file"
                    @change="addThumb"
                    class="custom-file-input"
                    id="inputGroupFile02"
                  />
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
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
        </div>

        <!-- /.card -->
      </div>
    </div>
    <!-- Modal -->
    <model title="Media uploader" size="modal-xl">
      <image-uploader></image-uploader>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </model>
  </section>
  <!-- /.content -->
</template>

<script>
import { mapGetters, mapActions, mapMutations } from "vuex";
import ImageUploader from "@Admin/views/ImageUploader";
import ProductSimple from "@Admin/pages/product/views/ProductSimple";
// import ProductAttribute from "@Admin/pages/product/views/ProductAttribute";
import model from "@Admin/components/Model.vue";
import HasError from "@Admin/components/HasError.vue";

export default {
  name: "ProductEdit",
  components: {
    ImageUploader,
    ProductSimple,
    // ProductAttribute,
    model,
    HasError
  },
  methods: {
    ...mapActions([
		"updateProduct",
		"setProduct",
		"showProduct",
		"fetchListCategories",
		"fetchListOptions",
		"addThumb",
		"setError"
    ]),
    ...mapMutations(["SET_STATUS", "SET_LOADING"]),
    patchProduct() {
             const formData = new FormData();
      for (const [key, value] of Object.entries(this.getSingleProduct)) {
        formData.append(key, value);
      }
      this.getFiles.forEach(file => {
        formData.append("images[]", file, file.name);
      });
      if (this.getThumb.file) {
        formData.append("images[thumb]", this.getThumb.file);
      }

      this.updateProduct(formData);
    },
    newModel() {
      $("#addNew").modal("show");
    },
    setSlug() {
      this.getSingleProduct.slug = this.getSingleProduct.name
        .toLowerCase()
        .replace(/[^\w ]+/g, "")
        .replace(/ +/g, "-");
    }
  },
  created() {
    // this.fetchListAttributes("all");
    this.SET_LOADING();
    this.showProduct(this.$route.params.id);
    // this.SET_STATUS("");
    this.fetchListCategories("all");
    this.fetchListOptions("all");
  },
  computed: mapGetters([
    "getSingleProduct",
    "getAllCategories",
    // "getVariations",
    // "getSelectedAttr",
    "getFiles",
    "getImages",
    "getThumb",
    // "getStatus",
    "hasError"
  ])
};
</script>

<style scoped>
.custom-file-label {
  font-size: 14px;
}
.card-header .form-group {
  margin-bottom: 0;
}
</style>
