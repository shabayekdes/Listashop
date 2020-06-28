<template>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-4">
        <div class="card card-outline card-primary">
          <div class="card-header">
            <h3 class="card-title">Create New Option</h3>
          </div>
          <!-- /.card-header -->
          <form @submit.prevent="patchOption">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Name</label>
                <input
                  type="text"
                  id="inputName"
                  v-model="getSingleOption.name"
                  class="form-control"
                  placeholder="Enter Option name ..."
                  :class="{ 'is-invalid': hasError('name') }"
                />
                <has-error field="name"></has-error>
              </div>
              <div class="form-group">
                <label for="selectType">Type</label>
                <select
                  class="custom-select"
                  v-model="getSingleOption.type"
                  :class="{ 'is-invalid': hasError('type') }"
                >
                  <option value selected disabled>Select type</option>
                  <option v-for="type in optionTypes" :value="type" :key="type">{{ type }}</option>
                </select>
                <has-error field="type"></has-error>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-success">Update</button>
              <button type="submit" class="btn btn-primary" data-dismiss="modal">close</button>
            </div>
            <!-- /.card-footer -->
          </form>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-8">
        <div class="card">
          <div class="card-header border-transparent">
            <h3 class="card-title">Add New Values</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table m-0">
                <thead>
                  <tr>
                    <th>Label</th>
                    <th>Price</th>
                    <th>Price Type</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr role="row" v-for="(value,key) in getAllOptionValues" :key="value.id">
                    <td>
                      <input
                        type="text"
                        :id="'inputName' + key"
                        v-model="value.value"
                        class="form-control"
                        placeholder="Enter Option name ..."
                      />
                    </td>
                    <td>
                      <input
                        type="text"
                        :id="'inputPrice' + key"
                        v-model="value.price"
                        class="form-control"
                        placeholder="Enter Option name ..."
                      />
                    </td>
                    <td>
                      <select class="form-control" v-model="value.price_type">
                        <option value selected disabled>Select price type</option>
                        <option v-for="type in priceTypes" :value="type" :key="type">{{ type }}</option>
                      </select>
                    </td>
                    <td>
                      <a
                        class="btn btn-danger btn-sm"
                        href="#"
                        @click.stop.prevent="removeValue(value)"
                      >
                        <i class="fas fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                  <tr role="row">
                    <td>
                      <input
                        type="text"
                        v-model="optionValue.value"
                        class="form-control"
                        placeholder="Enter value name ..."
                      />
                    </td>
                    <td>
                      <input
                        type="number"
                        v-model="optionValue.price"
                        class="form-control"
                        placeholder="Enter amount price ..."
                      />
                    </td>
                    <td>
                      <select v-model="optionValue.price_type" class="form-control">
                        <option value selected disabled>Select price type</option>
                        <option v-for="type in priceTypes" :value="type" :key="type">{{ type }}</option>
                      </select>
                    </td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">
            <a
              href="#"
              @click.stop.prevent="addValue"
              class="btn btn-sm btn-default float-left"
            >Add Value</a>
          </div>
          <!-- /.card-footer -->
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- Modal -->
  </section>
  <!-- /.content -->
</template>

<script>
import { mapGetters, mapActions, mapMutations } from "vuex";
import HasError from "@Admin/components/HasError.vue";

export default {
  name: "EditOption",
  components: {
    HasError
  },
  data() {
    return {
      optionTypes: ["Dropdown", "Checkbox"],
      priceTypes: ["Fixed", "Percentage"],
      optionType: {
        type: ""
      },
      optionValue: {
        price_type: ""
      }
    };
  },
  methods: {
    ...mapActions([
      "storeOption",
      "updateOption",
      "showOption",
      "addSelectedOptionVal",
      "setMode"
    ]),
    ...mapMutations(["RESET_NEW_OPTION", "REMOVE_OPTION_VALUE"]),
    patchOption() {
      this.updateOption({
        id: this.$route.params.id,
        name: this.getSingleOption.name,
        type: this.getSingleOption.type,
        values: this.getAllOptionValues
      });
    },
    addValue() {
      if (this.optionValue.value != undefined) {
        this.addSelectedOptionVal(this.optionValue);
        this.optionValue = {
          price_type: ""
        };
      }
    },
    removeValue(value) {
      this.REMOVE_OPTION_VALUE(value);
      this.optionValue = {
        price_type: ""
      };
    }
  },
  watch: {
    getStatus(val, oldVal) {
      if (val == "ok") {
        this.$router.push({ path: "/admin/options" });
      }
    }
  },
  created() {
    this.showOption(this.$route.params.id);
  },
  computed: mapGetters([
    "getSingleOption",
    "getAllOptionValues",
    "getStatus",
    "getMode",
    "hasError"
  ])
};
</script>
