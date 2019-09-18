<template>
  <div class="content-wrapper" style="min-height: 971.94px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-9">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button
                  type="button"
                  class="btn btn-tool"
                  data-card-widget="collapse"
                  data-toggle="tooltip"
                  title="Collapse"
                >
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Product Name</label>
                <input type="text" v-model="getNewProduct.name" id="inputName" class="form-control" />
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="inlineFormInputGroup">Slug</label>
                <div class="input-group mb-2 col-sm-10">
                  <div class="input-group-prepend">
                    <div class="input-group-text">product/</div>
                  </div>
                  <input
                    type="text"
                    v-model="getNewProduct.slug"
                    class="form-control"
                    id="inlineFormInputGroup"
                    placeholder="Username"
                  />
                </div>
              </div>
              <div class="form-group">
                <label for="inputDescription">Description</label>
                <textarea id="inputDescription" class="form-control" rows="4"></textarea>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title">Product Data</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-3">
                  <div
                    class="nav flex-column nav-pills"
                    id="v-pills-tab"
                    role="tablist"
                    aria-orientation="vertical"
                  >
                    <a
                      class="nav-link active"
                      id="v-pills-home-tab"
                      data-toggle="pill"
                      href="#v-pills-home"
                      role="tab"
                      aria-controls="v-pills-home"
                      aria-selected="true"
                    >General</a>
                  </div>
                </div>
                <div class="col-9">
                  <div class="tab-content" id="v-pills-tabContent">
                    <div
                      class="tab-pane fade show active"
                      id="v-pills-home"
                      role="tabpanel"
                      aria-labelledby="v-pills-home-tab"
                    >
                      <div class="card">
                        <div class="card-body">
                          <div class="form-group row">
                            <label
                              for="colFormLabelSm"
                              class="col-sm-2 col-form-label col-form-label-sm"
                            >Price (EGP)</label>
                            <div class="col-sm-10">
                              <input
                                type="number"
                                v-model="getNewProduct.price"
                                class="form-control form-control-sm"
                                id="colFormLabelSm"
                              />
                            </div>
                          </div>
                          <div class="form-group row">
                            <label
                              for="colFormLabelSm"
                              class="col-sm-2 col-form-label col-form-label-sm"
                            >Cost (EGP)</label>
                            <div class="col-sm-10">
                              <input
                                type="number"
                                v-model="getNewProduct.cost"
                                class="form-control form-control-sm"
                                id="colFormLabelSm"
                              />
                            </div>
                          </div>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

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
                @click="createProduct"
                class="btn btn-block bg-gradient-primary btn-lg"
              >Save</button>
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
                <select v-model="getNewProduct.category_id" class="form-control">
                  <option value disabled>Select Category</option>
                  <option
                    v-for="category in getAllCategories"
                    :key="category.id"
                    :value="category.id"
                  >{{ category.name }}</option>
                </select>
              </div>
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
              <div class="row mb-3">
                <div class="col-md-4 offset-md-4">
                  <img
                    class="img-thumbnail mx-auto"
                    width="200"
                    height="200"
                    :src="getImage.url"
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
                    >{{ getImage.name }}</label>
                    <input
                      type="file"
                      @change="uploadImage"
                      class="custom-file-input"
                      id="inputGroupFile02"
                    />
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>

          <!-- /.card -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  name: "ProductEdit",
  data() {
    return {};
  },
  methods: {
    ...mapActions([
      "fetchListProducts",
      "storeProduct",
      "fetchListCategories",
      "uploadImage"
    ]),
    createProduct() {
      this.storeProduct(this.getNewProduct);
    }
  },
  created() {
    this.fetchListProducts();
    this.fetchListCategories("all");
  },
  watch: {
    getNewProduct: {
      handler: function(val, oldVal) {
        this.getNewProduct.slug = val.name
          .toLowerCase()
          .replace(/[^\w ]+/g, "")
          .replace(/ +/g, "-");
      },
      deep: true
    }
  },
  computed: mapGetters([
    "getAllProducts",
    "getNewProduct",
    "getAllCategories",
    "getMetaData",
    "getImage"
  ])
};
</script>

<style scoped>
.custom-file-label {
  font-size: 14px;
}
</style>
