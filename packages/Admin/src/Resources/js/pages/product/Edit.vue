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

        <div class="card card-outline card-primary">
          <div class="card-header">
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-2 col-form-label card-title">Product Data -</label>
              <div class="col-sm-3">
                <select
                  class="form-control"
                  v-model="getSingleProduct.type"
                  id="exampleFormControlSelect1"
                >
                  <option value="simple">Simple product</option>
                  <option value="configurable">Attribute product</option>
                </select>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <product-simple v-if="getSingleProduct.type == 'simple'" />
          <product-attribute v-else />
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
        <div class="card card-outline card-primary">
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
              v-show="!editMode"
              @click="createProduct"
              class="btn btn-block bg-gradient-primary btn-lg"
            >Save</button>
            <button
              type="button"
              v-show="editMode"
              @click="patchProduct"
              class="btn btn-block bg-gradient-success btn-lg"
            >Update</button>
          </div>
          <!-- /.card-body -->
        </div>

        <div class="card card-outline card-primary">
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
                v-model="getSingleProduct.categories_id"
                name="categories_id"
                id="categories_id"
                class="custom-select"
                :class="{ 'is-invalid': hasError('categories_id') }"
              >
                <option value disabled>Select Category</option>
                <option
                  v-for="category in getAllCategories"
                  :key="category.id"
                  :value="category.id"
                >{{ category.name }}</option>
              </select>
              <has-error field="categories_id"></has-error>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <div class="card card-outline card-primary">
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
        <div class="card card-outline card-primary">
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
            <a class="btn btn-info btn-sm" @click="newModel" href="#">
              <i class="fas fa-pencil-alt"></i>
              Edit
            </a>
          </div>
          <!-- /.card-body -->
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
import { mapGetters, mapActions, mapState } from "vuex";
import ImageUploader from "@Admin/views/ImageUploader";
import ProductSimple from "@Admin/pages/product/views/ProductSimple";
import ProductAttribute from "@Admin/pages/product/views/ProductAttribute";
import model from "@Admin/components/Model.vue";
import HasError from "@Admin/components/HasError.vue";

export default {
  name: "ProductEdit",
  components: {
    ImageUploader,
    ProductSimple,
    ProductAttribute,
    model,
    HasError
  },
  props: {
    product: {
      type: Object,
      default: function() {
        return {};
      }
    },
    editMode: {
      type: Boolean,
      default: false
    }
  },
  data() {
    return {};
  },
  methods: {
    ...mapActions([
      "storeProduct",
      "updateProduct",
      "setProduct",
      "fetchListCategories",
      "addThumb",
      "resetImages",
      "setError"
    ]),
    createProduct() {
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
      formData.append("variations", JSON.stringify(this.getVariations));
      this.storeProduct(formData);
    },
    patchProduct() {
      this.updateProduct(this.getSingleProduct);
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
    this.fetchListCategories("all");
    if (this.editMode == true) {
      this.setProduct(this.product);
    }
  },
  watch: {
    getStatus(val, oldVal) {
      if (val == "ok") {
        this.$router.push({ path: "/admin/products" });
        this.resetImages();
      }
    }
  },
  computed: mapGetters([
    "getSingleProduct",
    "getAllCategories",
    "getVariations",
    "getFiles",
    "getThumb",
    "getStatus",
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
