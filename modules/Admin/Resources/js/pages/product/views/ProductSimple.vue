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
            id="v-pills-inventory-tab"
            data-toggle="pill"
            href="#v-pills-inventory"
            role="tab"
            aria-controls="v-pills-inventory"
            aria-selected="false"
          >Inventory</a>
          <a
            class="nav-link"
            id="v-pills-shipping-tab"
            data-toggle="pill"
            href="#v-pills-shipping"
            role="tab"
            aria-controls="v-pills-shipping"
            aria-selected="false"
          >Shipping</a>
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
            id="v-pills-shipping"
            role="tabpanel"
            aria-labelledby="v-pills-shipping-tab"
          >shipping</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import HasError from "@Admin/components/HasError.vue";

export default {
  name: "ProductSimple",
  components: {
    HasError
  },
  data() {
    return {};
  },
  methods: {
    ...mapActions(["setError"])
  },
  computed: mapGetters(["getSingleProduct", "hasError"])
};
</script>

<style>
</style>
