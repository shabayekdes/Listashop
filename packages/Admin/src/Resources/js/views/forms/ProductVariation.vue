<template>
  <div
    class="tab-pane fade"
    id="v-pills-variations"
    role="tabpanel"
    aria-labelledby="v-pills-variations-tab"
  >
    <div class="card collapsed-card" v-for="variation in getVariations" :key="variation.id">
      <div class="card-header">
        <h3 class="card-title">
          <span v-for="item in variation.attributes" :key="item.id">{{ item.label }} /</span>
        </h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-plus"></i>
          </button>
        </div>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <div class="card-body">
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
                  v-model="variation.price"
                  class="form-control form-control-sm"
                  id="price"
                />
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
                  v-model="variation.cost"
                  class="form-control form-control-sm"
                  id="cost"
                />
              </div>
            </div>
            <div class="form-group row">
              <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Qauntity</label>
              <div class="col-sm-6">
                <input
                  type="number"
                  v-model="variation.qauntity"
                  class="form-control form-control-sm"
                  id="qauntity"
                />
              </div>
            </div>
            <div class="form-group row">
              <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">SKU</label>
              <div class="col-sm-6">
                <input
                  type="number"
                  v-model="variation.sku"
                  class="form-control form-control-sm"
                  id="sku"
                />
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  name: "ProductVariation",
  data() {
    return {};
  },

  computed: mapGetters(["getVariations"])
};
</script>

<style>
</style>
