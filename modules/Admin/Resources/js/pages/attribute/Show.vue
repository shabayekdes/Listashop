<template>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-4">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Add New {{ getSingleAttribute.name }}</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form-option />
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
                  <datatable :columns="columns" :length="getAllOptions.length">
                    <tr role="row" v-for="option in getAllOptions" :key="option.id">
                      <td class="sorting_1">{{ option.id }}</td>
                      <td>{{ option.label }}</td>
                      <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm" @click="editModel(option)" href="#">
                          <i class="fas fa-pencil-alt"></i>
                          Edit
                        </a>
                        <a class="btn btn-danger btn-sm" @click="deleteOption(option.id)" href="#">
                          <i class="fas fa-trash"></i>
                          Delete
                        </a>
                      </td>
                    </tr>
                  </datatable>
                </div>
              </div>
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
      <form-option />
    </model>
  </section>
  <!-- /.content -->
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import datatable from "@Admin/components/DataTable.vue";
import HasError from "@Admin/components/HasError.vue";
import model from "@Admin/components/Model.vue";
import formOption from "@Admin/views/forms/AttributeOptionForm.vue";

export default {
  name: "Attribute-Options",
  components: {
    datatable,
    HasError,
    model,
    formOption
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
    ...mapActions([
      "showAttribute",
      "storeAttribute",
      "setOption",
      "deleteOption",
      "resetOption",
      "setMode",
      "setError"
    ]),
    editModel(option) {
      this.setMode(true);
      $("#addNew").modal("show");
      this.setOption(option);
    }
  },
  created() {
    this.showAttribute(this.$route.params.id);
  },
  mounted() {
    this.resetOption();
  },
  computed: mapGetters(["getSingleAttribute", "getAllOptions", "getMetaData"])
};
</script>
