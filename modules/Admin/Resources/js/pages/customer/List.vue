<template>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Users List</h3>
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
                  <datatable :columns="columns" :length="getAllCustomers.length">
                    <tr
                      role="row"
                      class="odd"
                      v-for="customer in getAllCustomers"
                      :key="customer.id"
                    >
                      <td class="sorting_1">{{ customer.id }}</td>
                      <td>{{ customer.name }}</td>
                      <td>{{ customer.email }}</td>
                      <td>{{ customer.phone }}</td>
                      <td class="project-actions text-right">
                        <div class="row">
                                                      <div class="col-sm-3 border-right">
                            <router-link
                              :to="{ name: 'customer.view',  params: { id: customer.id } }"
                              class="btn btn-primary btn-xs"
                            >
                              <i class="fas fa-folder"></i>
                            </router-link>
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-3 border-right">
                            <a class="btn btn-primary btn-xs" href="#">
                              <i class="fas fa-folder"></i>
                            </a>
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-3">
                            <a class="btn btn-danger btn-xs" href="#">
                              <i class="fas fa-trash"></i>
                            </a>
                          </div>
                          <!-- /.col -->
                        </div>

                        <!-- <a class="btn btn-info btn-sm" @click="editProduct(product.id)" href>
                          <i class="fas fa-pencil-alt"></i>
                          Edit
                        </a>-->
                      </td>
                    </tr>
                  </datatable>
                </div>
              </div>
              <pagination :meta_data="getMetaData" v-on:next="fetchListCustomers"></pagination>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import pagination from "@Admin/components/Pagination.vue";
import datatable from "@Admin/components/DataTable.vue";

export default {
  name: "Users",
  components: {
    pagination,
    datatable
  },
  data() {
    return {
      columns: [
        { width: "2%", label: "#", name: "id", active: true },
        { width: "20%", label: "Name", name: "name", active: true },
        { width: "40%", label: "Email", name: "email", active: true },
        { width: "20%", label: "Phone", name: "phone", active: true },
        { width: "18%", label: "Action", name: "action", active: false }
      ]
    };
  },
  methods: {
    ...mapActions(["fetchListCustomers"])
  },
  created() {
    this.fetchListCustomers();
  },
  computed: mapGetters(["getAllCustomers", "getMetaData"])
};
</script>
