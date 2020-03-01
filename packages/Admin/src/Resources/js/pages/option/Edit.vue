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
          <form
            @submit.prevent="getMode ? patchOption() : createOption()"
            enctype="multipart/form-data"
          >
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
                <select class="form-control" v-model="getSingleOption.type">
                  <option v-for="type in optionTypes" :value="type" :key="type">{{ type }}</option>
                </select>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" v-if="getMode" class="btn btn-success">Update</button>
              <button type="submit" v-else class="btn btn-primary">Submit</button>
              <button
                type="submit"
                v-show="getMode"
                class="btn btn-primary"
                data-dismiss="modal"
              >close</button>
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
                        placeholder="Enter Option name ..."
                      />
                    </td>
                    <td>
                      <input
                        type="text"
                        v-model="optionValue.price"
                        class="form-control"
                        placeholder="Enter Option name ..."
                      />
                    </td>
                    <td>
                      <select v-model="optionValue.price_type" class="form-control">
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
              class="btn btn-sm btn-info float-left"
            >Place New Order</a>
            <a
              href="javascript:void(0)"
              class="btn btn-sm btn-secondary float-right"
            >View All Orders</a>
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
        type: "Dropdown"
      },
      optionValue: {
        type: "Fixed"
      }
    };
  },
  methods: {
    ...mapActions(["storeOption", "addSelectedOptionVal"]),
    ...mapMutations(["REMOVE_OPTION_VALUE"]),
    createOption() {
      this.storeOption({
        option: this.getSingleOption,
        values: this.getAllOptionValues
      });
    },
    addValue() {
      this.addSelectedOptionVal(this.optionValue);
      this.optionValue = {
        type: "Fixed"
      };
    },
    removeValue(value) {
      //   console.log(this.getAllOptionValues.indexOf(value));
      // this.events.splice(this.events.indexOf(event), 1);
      this.REMOVE_OPTION_VALUE(value);
    }
  },
  computed: mapGetters([
    "getSingleOption",
    "getAllOptionValues",
    "getMode",
    "hasError"
  ])
};
</script>
