<template>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-sm-12 col-md-5">
                <h3 class="card-title">Products List</h3>
              </div>
              <div class="col-sm-12 col-md-7">
                <router-link :to="{ name: 'product.create' }" class="btn btn-success float-right">
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
                  <datatable :columns="columns" :length="getAllProducts.length">
                    <tr role="row" class="odd" v-for="product in getAllProducts" :key="product.id">
                      <td class="sorting_1">{{ product.id }}</td>
                      <td>
                        <img
                          src="/img/default-150x150.png"
                          v-if="product.thumbnail == null"
                          alt="Product"
                          class="img-circle img-size-64 mr-2"
                        />
                        <img
                          :src="product.thumbnail"
                          v-else
                          alt="Product"
                          class="img-circle img-size-64 mr-2"
                        />
                      </td>
                      <td>{{ product.name | slug }}</td>
                      <td>{{ product.price }}</td>
                      <td>{{ product.qty }}</td>
                      <td class="project-state text-center">
                        <span v-show="product.status" class="badge badge-success">Active</span>
                        <span v-show="!product.status" class="badge badge-warning">Non-Active</span>
                      </td>
                      <td class="project-actions text-right">
                        <div class="row">
                          <div class="col-sm-3 border-right">
                            <a class="btn btn-primary btn-xs" :href="'/store/'+product.slug">
                              <i class="fas fa-folder"></i>
                            </a>
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-3 border-right">
                            <router-link
                              :to="{ name: 'product.edit',  params: { id: product.id } }"
                              class="btn btn-info btn-xs"
                            >
                              <i class="fas fa-pencil-alt"></i>
                            </router-link>
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-3">
                            <a
                              class="btn btn-danger btn-xs"
                              @click="deleteProduct(product.id)"
                              href="#"
                            >
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
              <pagination :meta_data="getMetaData" v-on:next="fetchListProducts"></pagination>
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
  name: "ProductList",
  components: {
    pagination,
    datatable
  },
  data() {
    return {
      columns: [
        { width: "2%", label: "#", name: "id", active: true },
        { width: "10%", label: "", name: "thumbnail", active: true },
        { width: "23%", label: "Name", name: "name", active: true },
        { width: "15%", label: "Price", name: "price", active: true },
        { width: "20%", label: "Quantity", name: "qty", active: true },
        { width: "15%", label: "Status", name: "status", active: true },
        { width: "18%", label: "Action", name: "action", active: false }
      ]
    };
  },
  methods: {
    ...mapActions([
      "fetchListProducts",
      "setProduct",
      "setMode",
      "deleteProduct"
    ]),
    editProduct(id) {
      this.setMode(true);
      this.$router.push({ name: "product.edit", params: { id } });
    }
  },
  created() {
    this.fetchListProducts();
  },
  computed: mapGetters(["getAllProducts", "getMetaData"])
};
</script>
