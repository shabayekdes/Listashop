<template>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-sm-12 col-md-5">
                <h3 class="card-title">Options List</h3>
              </div>
              <div class="col-sm-12 col-md-7">
                <router-link :to="{ name: 'option.create'}" class="btn btn-success float-right">
                  Add New
                  <i class="fas fa-cart-plus"></i>
                </router-link>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <div class="dataTables_length" id="example1_length">
                    <label>
                      Show entries
                      <select
                        name="example1_length"
                        aria-controls="example1"
                        class="custom-select custom-select-sm form-control form-control-sm"
                      >
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                      </select>
                    </label>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div id="example1_filter" class="dataTables_filter float-right">
                    <label>
                      Search:
                      <input
                        type="search"
                        class="form-control form-control-sm"
                        placeholder
                        aria-controls="example1"
                      />
                    </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <datatable :columns="columns" :length="getAllOptions.length">
                    <tr role="row" v-for="option in getAllOptions" :key="option.id">
                      <td class="sorting_1">{{ option.id }}</td>
                      <td>{{ option.name }}</td>
                      <td>{{ option.type }}</td>
                      <td class="project-actions text-right">
                        <div class="row">
                          <div class="col-sm-3 border-right">
                            <a class="btn btn-info btn-sm" @click="editOption(option.id)" href="#">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-3">
                            <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash"></i>
                            </a>
                          </div>
                          <!-- /.col -->
                        </div>
                      </td>
                    </tr>
                  </datatable>
                </div>
              </div>
              <pagination :meta_data="getMetaData" v-on:next="fetchListOptions"></pagination>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- Modal -->
    <model title="Update Attribute" size="modal-sm"></model>
  </section>
  <!-- /.content -->
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import pagination from "@Admin/components/Pagination.vue";
import datatable from "@Admin/components/DataTable.vue";
import model from "@Admin/components/Model.vue";

export default {
  name: "Options",
  components: {
    pagination,
    datatable,
    model
  },
  data() {
    return {
      columns: [
        { width: "2%", label: "#", name: "id", active: true },
        { width: "15%", label: "Name", name: "name", active: true },
        { width: "15%", label: "Type", name: "type", active: true },
        { width: "18%", label: "Action", name: "action", active: false }
      ]
    };
  },
  methods: {
    ...mapActions(["fetchListOptions", "setMode"]),
    editOption(id) {
      this.setMode(true);
      this.$router.push({ name: "option.edit", params: { id } });
    }
  },
  created() {
    this.fetchListOptions();
  },
  computed: mapGetters(["getAllOptions", "hasError", "getMetaData"])
};
</script>
