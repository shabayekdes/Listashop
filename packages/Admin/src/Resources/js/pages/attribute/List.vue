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
          <form-attribute />
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
                      <td v-if="attribute.options != ''">{{ attribute.options }}</td>
                      <td v-else>-</td>
                      <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#">
                          <i class="fas fa-folder"></i>
                          View
                        </a>
                        <a class="btn btn-info btn-sm" @click="editModel(attribute)" href="#">
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
    <!-- Modal -->
    <model title="Update Attribute" size="modal-sm">
      <form-attribute />
    </model>
  </section>
  <!-- /.content -->
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import pagination from "@Admin/components/Pagination.vue";
import datatable from "@Admin/components/DataTable.vue";
import model from "@Admin/components/Model.vue";
import formAttribute from "@Admin/views/forms/AttributeForm.vue";

export default {
  name: "Attributes",
  components: {
    pagination,
    datatable,
    model,
    formAttribute
  },
  data() {
    return {
      columns: [
        { width: "2%", label: "#", name: "id", active: true },
        { width: "15%", label: "Name", name: "name", active: true },
        { width: "15%", label: "Terms", name: "options", active: true },
        { width: "18%", label: "Action", name: "action", active: false }
      ]
    };
  },
  methods: {
    ...mapActions([
      "fetchListAttributes",
      "setAttribute",
      "resetAttribute",
      "setMode",
      "setError"
    ]),
    editModel(attribute) {
      this.setMode(true);
      $("#addNew").modal("show");
      this.setAttribute(attribute);
    }
  },
  created() {
    this.fetchListAttributes();
  },
  mounted() {
    this.resetAttribute();
  },
  computed: mapGetters([
    "getAllAttributes",
    "getSingleAttribute",
    "hasError",
    "getMetaData"
  ])
};
</script>
