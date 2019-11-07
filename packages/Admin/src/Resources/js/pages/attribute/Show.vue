<template>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-4">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Create New Attribute</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form @submit.prevent="createAttribute">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Attribute Name</label>
                <input
                  type="text"
                  v-model="getSingleAttribute.name"
                  id="inputName"
                  class="form-control"
                  :class="{ 'is-invalid': hasError('name') }"
                  placeholder="Enter name of attribute ..."
                />
                <has-error field="name"></has-error>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-8">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">List Attributes</h3>
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
                  <datatable :columns="columns" :length="getAllAttributes.length">
                    <tr role="row" v-for="attribute in getAllAttributes" :key="attribute.id">
                      <td class="sorting_1">{{ attribute.id }}</td>
                      <td>{{ attribute.name }}</td>
                      <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#">
                          <i class="fas fa-folder"></i>
                          View
                        </a>
                        <a class="btn btn-info btn-sm" href="#">
                          <i class="fas fa-pencil-alt"></i>
                          Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                          <i class="fas fa-trash"></i>
                          Delete
                        </a>
                      </td>
                    </tr>
                  </datatable>
                </div>
              </div>
              <pagination :meta_data="getMetaData" v-on:next="fetchListAttributes"></pagination>
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
import HasError from "@Admin/components/HasError.vue";

export default {
  name: "Attributes",
  components: {
    pagination,
    datatable,
    HasError
  },
  data() {
    return {
      columns: [
        { width: "2%", label: "#", name: "id", active: true },
        { width: "15%", label: "Name", name: "name", active: true },
        { width: "18%", label: "Action", name: "action", active: false }
      ]
    };
  },
  methods: {
    ...mapActions(["fetchListAttributes", "storeAttribute", "setError"]),
    createAttribute() {
      this.storeAttribute(this.getSingleAttribute);
    }
  },
  created() {
    this.fetchListAttributes();
  },
  computed: mapGetters([
    "getAllAttributes",
    "getSingleAttribute",
    "hasError",
    "getMetaData"
  ])
};
</script>
