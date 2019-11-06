<template>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-4">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Create New Category</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form-category />
        </div>
      </div>
      <div class="col-8">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">List Categories</h3>
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
                  <datatable :columns="columns" :length="getAllCategories.length">
                    <tr role="row" v-for="category in getAllCategories" :key="category.id">
                      <td class="sorting_1">{{ category.id }}</td>
                      <td>{{ category.name }}</td>
                      <td>{{ category.description }}</td>
                      <td>
                        <div class="form-group">
                          <div class="custom-control custom-switch custom-switch-on-success">
                            <input
                              type="checkbox"
                              v-model="category.status"
                              @change="changeStatus(category)"
                              class="custom-control-input"
                              :id="category.slug"
                            />
                            <label
                              v-show="category.status"
                              class="custom-control-label"
                              :for="category.slug"
                            >Active</label>
                            <label
                              v-show="!category.status"
                              class="custom-control-label"
                              :for="category.slug"
                            >Non-Active</label>
                          </div>
                        </div>
                      </td>
                      <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#">
                          <i class="fas fa-folder"></i>
                          View
                        </a>
                        <a class="btn btn-info btn-sm" @click="editModel(category)" href="#">
                          <i class="fas fa-pencil-alt"></i>
                          Edit
                        </a>
                        <a
                          class="btn btn-danger btn-sm"
                          @click="deleteCategory(category.id)"
                          href="#"
                        >
                          <i class="fas fa-trash"></i>
                          Delete
                        </a>
                      </td>
                    </tr>
                  </datatable>
                </div>
              </div>
              <pagination :meta_data="getMetaData" v-on:next="fetchListCategories"></pagination>
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
    <model title="Update Category" size="modal-xl">
      <form-category />
    </model>
  </section>
  <!-- /.content -->
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import pagination from "@Admin/components/Pagination.vue";
import datatable from "@Admin/components/DataTable.vue";
import model from "@Admin/components/Model.vue";
import formCategory from "@Admin/views/forms/CategoryForm.vue";

export default {
  name: "Categories",
  components: {
    pagination,
    datatable,
    model,
    formCategory
  },
  data() {
    return {
      columns: [
        { width: "2%", label: "#", name: "id", active: true },
        { width: "15%", label: "Name", name: "name", active: true },
        {
          width: "25%",
          label: "Description",
          name: "description",
          active: true
        },
        { width: "15%", label: "Status", name: "status", active: true },
        { width: "18%", label: "Action", name: "action", active: false }
      ]
    };
  },
  methods: {
    ...mapActions([
      "fetchListCategories",
      "storeCategory",
      "updateCategory",
      "setCategory",
      "setMode",
      "resetCategory",
      "deleteCategory"
    ]),
    editModel(category) {
      this.setMode(true);
      $("#addNew").modal("show");
      this.setCategory(category);
    },
    changeStatus(category) {
      this.updateCategory(category);
    }
  },
  created() {
    this.fetchListCategories();
  },
  mounted() {
    this.resetCategory();
  },
  computed: mapGetters(["getAllCategories", "getMetaData"])
};
</script>
