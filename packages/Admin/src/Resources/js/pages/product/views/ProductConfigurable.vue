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
          >Options</a>
          <!-- <a
            class="nav-link"
            id="v-pills-variations-tab"
            data-toggle="pill"
            href="#v-pills-variations"
            role="tab"
            aria-controls="v-pills-variations"
            aria-selected="false"
          >Variations</a> -->
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
        <div class="card collapsed-card">
          <div class="card-header">
            <h3 class="card-title">Name Option</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="display: none;">
            <div class="info-box bg-gradient-info">
              <div class="info-box-content">
                <div class="d-flex bd-highlight">
                  <div class="mr-auto p-2 bd-highlight">
                    <div class="form-group">
                      <label for="optionName">Option name</label>
                      <multiselect v-model="selected" :options="options" id="optionName"></multiselect>
                    </div>
                  </div>
                  <div class="mr-auto p-2 bd-highlight">
                    <div class="form-group">
                      <label for="type">Type</label>
                      <select class="form-control" id="type">
                        <option value="simple">Simple product</option>
                        <option value="configurable">Attribute product</option>
                      </select>
                    </div>
                  </div>
                  <div class="align-self-center p-2 bd-highlight">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" />
                      <label class="form-check-label">Required</label>
                    </div>
                  </div>
                  <div class="align-self-center p-2 bd-highlight">
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </div>
                </div>
              </div>
              <!-- /.info-box-content -->
            </div>

            <table class="table table-condensed">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Value</th>
                  <th>Price</th>
                  <th>Price Type</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1.</td>
                  <td>
                    <multiselect v-model="selected" :options="options" id="optionName"></multiselect>
                  </td>
                  <td>
                    <input class="form-control" type="number" />
                  </td>
                  <td>
                    <select class="form-control" id="type">
                      <option value="simple">Simple product</option>
                      <option value="configurable">Attribute product</option>
                    </select>
                  </td>
                </tr>
                <a href="compose.html" class="btn btn-primary btn-block mb-3">Compose</a>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>        <div class="card collapsed-card">
          <div class="card-header">
            <h3 class="card-title">Name Option</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="display: none;">
            <div class="info-box bg-gradient-info">
              <div class="info-box-content">
                <div class="d-flex bd-highlight">
                  <div class="mr-auto p-2 bd-highlight">
                    <div class="form-group">
                      <label for="optionName">Option name</label>
                      <multiselect v-model="selected" :options="options" id="optionName"></multiselect>
                    </div>
                  </div>
                  <div class="mr-auto p-2 bd-highlight">
                    <div class="form-group">
                      <label for="type">Type</label>
                      <select class="form-control" id="type">
                        <option value="simple">Simple product</option>
                        <option value="configurable">Attribute product</option>
                      </select>
                    </div>
                  </div>
                  <div class="align-self-center p-2 bd-highlight">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" />
                      <label class="form-check-label">Required</label>
                    </div>
                  </div>
                  <div class="align-self-center p-2 bd-highlight">
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </div>
                </div>
              </div>
              <!-- /.info-box-content -->
            </div>

            <table class="table table-condensed">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Value</th>
                  <th>Price</th>
                  <th>Price Type</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1.</td>
                  <td>
                    <multiselect v-model="selected" :options="options" id="optionName"></multiselect>
                  </td>
                  <td>
                    <input class="form-control" type="number" />
                  </td>
                  <td>
                    <select class="form-control" id="type">
                      <option value="simple">Simple product</option>
                      <option value="configurable">Attribute product</option>
                    </select>
                  </td>
                </tr>
                <a href="compose.html" class="btn btn-primary btn-block mb-3">Compose</a>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
            <div class="card">
              <div class="card-header">
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label card-title">Product Data -</label>
                  <div class="col-sm-3">
                    <select class="form-control" v-model="attribute" id="exampleFormControlSelect1">
                      <option value disabled>Select Category</option>
                      <!-- <option
                        v-for="attribute in getAllAttributes"
                        :key="attribute.id"
                        :value="attribute"
                      >{{ attribute.name }}</option> -->
                    </select>
                  </div>
                  <div class="col-sm-3">
                    <button
                      type="button"
                      class="btn btn-primary"
                    >
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

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
          <!-- <product-variation /> -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions, mapMutations } from "vuex";
// import ProductVariation from "@Admin/views/forms/ProductVariation";
import HasError from "@Admin/components/HasError.vue";
  import Multiselect from 'vue-multiselect'

export default {
  name: "ProductConfigurable",
  components: {
    // ProductVariation,
    HasError,
    Multiselect
  },
  data() {
    return {
      attribute: "",
      selected: null,
        options: ['list', 'of', 'options']
    };
  },
  methods: {
    ...mapActions(["removeSelectedAttr", "setError"]),
    // ...mapMutations(["REMOVE_VARIATION", "SET_VARIATION", "RESET_OPTIONS"]),
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
    //   this.SET_VARIATION(r);
      return r;
    }
  },
  watch: {
    // getSelectedAttr(val, oldVal) {
    //   this.RESET_OPTIONS();
    //   val.map(attr => {
    //     this.getAllOptions.push(attr.options);
    //   });
    //   if (this.getAllOptions.length > 0) {
    //     this.cartesian(...this.getAllOptions);
    //   } else {
    //     this.REMOVE_VARIATION([]);
    //   }
    // }
  },
  computed: mapGetters([
    "getSingleProduct",
    "getAllOptions",
    // "getAllAttributes",
    // "getSelectedAttr",
    "hasError"
  ])
};
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
