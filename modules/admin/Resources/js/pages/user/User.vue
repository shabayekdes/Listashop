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
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
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
                    <datatable :columns="columns">
                      <tr role="row" class="odd" v-for="user in getAllUsers" :key="user.id">
                        <td class="sorting_1">{{ user.id }}</td>
                        <td>
                          <img
                            v-bind:src="user.avatar"
                            border="0"
                            width="100"
                            class="img-rounded"
                            align="center"
                          />
                        </td>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>
                          <a href="#" class="gray-txt btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                          </a>
                          <a href="#" class="gray-txt btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                          </a>
                        </td>
                      </tr>
                    </datatable>
                  </div>
                </div>
                <pagination :meta_data="getMetaData" v-on:next="fetchListUsers"></pagination>
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
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import pagination from "@/components/Pagination.vue";
import datatable from "@/components/DataTable.vue";

export default {
  name: "Users",
  components: {
    pagination,
    datatable
  },
  data() {
    return {
      columns: [
        { width: "5%", label: "#", name: "id", active: true },
        { width: "15%", label: "Name", name: "name", active: true },
        { width: "20%", label: "Email", name: "email", active: true },
        { width: "20%", label: "Action", name: "action", active: false }
      ]
    };
  },
  methods: {
    ...mapActions(["fetchListUsers"])
  },
  created() {
    this.fetchListUsers();
  },
  computed: mapGetters(["getAllUsers", "getMetaData"])
};
</script>

