<template>
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
            id="v-pills-shipping-tab"
            data-toggle="pill"
            href="#v-pills-shipping"
            role="tab"
            aria-controls="v-pills-shipping"
            aria-selected="true"
          >Shipping</a>
          <a
            class="nav-link"
            id="v-pills-inventory-tab"
            data-toggle="pill"
            href="#v-pills-inventory"
            role="tab"
            aria-controls="v-pills-inventory"
            aria-selected="false"
          >Inventory</a>
          <a
            class="nav-link"
            id="v-pills-variations-tab"
            data-toggle="pill"
            href="#v-pills-variations"
            role="tab"
            aria-controls="v-pills-variations"
            aria-selected="false"
          >Variations</a>
        </div>
      </div>
      <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent">
          <div
            class="tab-pane fade show active"
            id="v-pills-shipping"
            role="tabpanel"
            aria-labelledby="v-pills-shipping-tab"
          >shipping</div>
          <div
            class="tab-pane fade"
            id="v-pills-inventory"
            role="tabpanel"
            aria-labelledby="v-pills-inventory-tab"
          >Inventory</div>
          <div
            class="tab-pane fade"
            id="v-pills-variations"
            role="tabpanel"
            aria-labelledby="v-pills-variations-tab"
          >
            <div class="card collapsed-card">
              <div class="card-header">
                <h3 class="card-title">Expandable</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">The body of the card</div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions, mapState } from "vuex";
import HasError from "@Admin/components/HasError.vue";

export default {
  name: "ProductAttribute",
  components: {
    HasError
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
    "getFiles",
    "getThumb",
    "getStatus",
    "hasError"
  ])
};
</script>

<style>
</style>
