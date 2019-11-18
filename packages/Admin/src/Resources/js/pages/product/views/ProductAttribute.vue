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
            id="v-pills-home-tab"
            data-toggle="pill"
            href="#v-pills-home"
            role="tab"
            aria-controls="v-pills-home"
            aria-selected="true"
          >General</a>
          <a
            class="nav-link"
            id="v-pills-shipping-tab"
            data-toggle="pill"
            href="#v-pills-shipping"
            role="tab"
            aria-controls="v-pills-shipping"
            aria-selected="false"
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
            id="v-pills-attribute-tab"
            data-toggle="pill"
            href="#v-pills-attribute"
            role="tab"
            aria-controls="v-pills-attribute"
            aria-selected="false"
          >Attributes</a>
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
                  <div class="col-sm-6">
                    <input
                      type="number"
                      v-model="getSingleProduct.price"
                      class="form-control form-control-sm"
                      id="colFormLabelSm"
                      :class="{ 'is-invalid': hasError('price') }"
                    />
                    <has-error field="price"></has-error>
                  </div>
                </div>
                <div class="form-group row">
                  <label
                    for="colFormLabelSm"
                    class="col-sm-2 col-form-label col-form-label-sm"
                  >Cost (EGP)</label>
                  <div class="col-sm-6">
                    <input
                      type="number"
                      v-model="getSingleProduct.cost"
                      class="form-control form-control-sm"
                      id="colFormLabelSm"
                      :class="{ 'is-invalid': hasError('cost') }"
                    />
                    <has-error field="cost"></has-error>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div
            class="tab-pane fade"
            id="v-pills-shipping"
            role="tabpanel"
            aria-labelledby="v-pills-shipping-tab"
          >shipping</div>
          <div
            class="tab-pane fade"
            id="v-pills-inventory"
            role="tabpanel"
            aria-labelledby="v-pills-inventory-tab"
          >
            <div class="card">
              <div class="card-body">
                <div class="form-group row">
                  <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">SKU</label>
                  <div class="col-sm-6">
                    <input
                      type="text"
                      v-model="getSingleProduct.sku"
                      class="form-control form-control-sm"
                      id="colFormLabelSm"
                      :class="{ 'is-invalid': hasError('sku') }"
                    />
                    <small
                      id="emailHelp"
                      class="form-text text-muted"
                    >Keep it blank to automatically generate sku.</small>
                    <has-error field="sku"></has-error>
                  </div>
                </div>
                <div class="form-group row">
                  <label
                    for="colFormLabelSm"
                    class="col-sm-2 col-form-label col-form-label-sm"
                  >Stock status</label>
                  <div class="col-sm-6">
                    <select class="form-control" id="exampleFormControlSelect1">
                      <option>In stock</option>
                      <option>Out of stock</option>
                    </select>
                    <has-error field="cost"></has-error>
                  </div>
                </div>
                <div class="form-group row">
                  <label
                    for="colFormLabelSm"
                    class="col-sm-2 col-form-label col-form-label-sm"
                  >Stock quantity</label>
                  <div class="col-sm-6">
                    <input
                      type="number"
                      v-model="getSingleProduct.quantity"
                      class="form-control form-control-sm"
                      id="colFormLabelSm"
                      :class="{ 'is-invalid': hasError('quantity') }"
                    />
                    <has-error field="quantity"></has-error>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div
            class="tab-pane fade"
            id="v-pills-attribute"
            role="tabpanel"
            aria-labelledby="v-pills-attribute-tab"
          >
            <div class="card">
              <div class="card-header">
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label card-title">Product Data -</label>
                  <div class="col-sm-3">
                    <select class="form-control" v-model="attribute" id="exampleFormControlSelect1">
                      <option value disabled>Select Category</option>
                      <option
                        v-for="attribute in getAllAttributes"
                        :key="attribute.id"
                        :value="attribute"
                      >{{ attribute.name }}</option>
                    </select>
                  </div>
                  <div class="col-sm-3">
                    <button type="button" @click="addAttribute()" class="btn btn-primary">
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div
                  class="card card-primary collapsed-card"
                  v-for="attribute in attributes"
                  :key="attribute.id"
                >
                  <div class="card-header">
                    <h3 class="card-title">{{ attribute.name }}</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button
                        type="button"
                        @click="removeAttribute(attribute)"
                        data-card-widget="remove"
                        class="btn btn-tool"
                      >
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                    <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">{{ attribute.name }}</div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <product-variation />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions, mapMutations } from "vuex";
import ProductVariation from "@Admin/views/forms/ProductVariation";
import HasError from "@Admin/components/HasError.vue";

export default {
  name: "ProductAttribute",
  components: {
    ProductVariation,
    HasError
  },
  data() {
    return {
      attributes: [],
      attribute: ""
    };
  },
  methods: {
    ...mapActions(["addSelectedAttr", "setError"]),
    ...mapMutations([
      "REMOVE_ATTRIBUTE",
      "REMOVE_VARIATION",
      "SET_VARIATION",
      "RESET_OPTIONS",
      "NEW_ATTRIBUTE"
    ]),
    addAttribute() {
      if (this.attribute != "") {
        this.attributes.unshift(this.attribute);
        this.REMOVE_ATTRIBUTE(this.attribute.id);
        this.attribute = "";
      }
    },
    removeAttribute(attribute) {
      this.NEW_ATTRIBUTE(attribute);
      this.attributes = this.attributes.filter(
        attr => attr.id !== attribute.id
      );
    },
    cartesian() {
      var r = [],
        arg = arguments,
        max = arg.length - 1;
      function helper(arr, i) {
        for (var j = 0, l = arg[i].length; j < l; j++) {
          var a = arr.slice(0); // clone arr
          a.push(arg[i][j]);
          if (i == max) r.push({ attributes: a });
          else helper(a, i + 1);
        }
      }
      helper([], 0);
      this.SET_VARIATION(r);
      return r;
    }
  },
  watch: {
    attributes(val, oldVal) {
      this.RESET_OPTIONS();
      val.map(attr => {
        this.getAllOptions.push(attr.options);
      });
      if (this.getAllOptions.length > 0) {
        this.cartesian(...this.getAllOptions);
      } else {
        this.REMOVE_VARIATION([]);
      }
    }
  },
  computed: mapGetters([
    "getSingleProduct",
    "getAllOptions",
    "getVariations",
    "getAllAttributes",
    "getSelectedAttr",
    "hasError"
  ])
};
</script>

<style>
</style>
