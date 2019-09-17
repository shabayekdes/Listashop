<template>
  <div class="content-wrapper" style="min-height: 971.94px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Categories</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="/admin">Admin</a>
              </li>
              <li class="breadcrumb-item active">Categories</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
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
                    <datatable :columns="columns">
                      <tbody>
                        <tr role="row" v-for="category in getAllCategories" :key="category.id">
                          <td class="sorting_1">{{ category.id }}</td>
                          <td>{{ category.name }}</td>
                          <td>{{ category.description }}</td>
                          <td class="project-state text-center">
                            <span v-show="category.status" class="badge badge-success">Active</span>
                            <span v-show="!category.status" class="badge badge-warning">Non-Active</span>
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
                      </tbody>
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
    </section>
    <!-- /.content -->
    <!-- Modal -->
    <model title="Update Category">
      <form-category :mode="editMode" />
    </model>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import pagination from "@/components/Pagination.vue";
import datatable from "@/components/DataTable.vue";
import model from "@/components/Model.vue";
import formCategory from "@/pages/category/Form.vue";

export default {
  name: "Users",
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
      ],
      editMode: false
    };
  },
  methods: {
    ...mapActions([
      "fetchListCategories",
      "storeCategory",
      "setCategory",
      "resetCategory",
      "deleteCategory"
    ]),
    editModel(category) {
      this.editMode = true;
      $("#addNew").modal("show");
      this.setCategory(category);
    }
  },
  created() {
    this.fetchListCategories();
  },
  mounted() {
    this.resetCategory();
  },
  computed: mapGetters(["getAllCategories", "getNewCategory", "getMetaData"])
};
</script>
