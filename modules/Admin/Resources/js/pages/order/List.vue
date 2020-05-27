<template>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-sm-12 col-md-5">
                <h3 class="card-title">Order List</h3>
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
                  <datatable :columns="columns" :length="getAllOrders.length">
                    <tr role="row" class="odd" v-for="order in getAllOrders" :key="order.id">
                      <td class="sorting_1">{{ order.id }}</td>
                      <td v-if="order.is_guest">{{ order.customer_name }}</td>
                      <td v-else>{{ order.user.name }}</td>
                      <td>{{ order.total }}</td>
                      <td>{{ order.payment_method_label }}</td>
                      <td>{{ order.payment_status_label }}</td>
                      <td>
                        <span class="badge badge-warning">{{ order.order_status_label }}</span>
                      </td>
                      <td>{{ order.created_at }}</td>
                      <td class="project-actions text-right">
                        <div class="row">
                          <div class="col-sm-3 border-right">
                            <a class="btn btn-primary btn-sm" @click="newModel(order)" href="#">
                              <i class="fas fa-folder"></i>
                            </a>
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-3 border-right">
                            <router-link
                              :to="{ name: 'order.view',  params: { id: order.id } }"
                              class="btn btn-info btn-sm"
                            >
                              <i class="fas fa-pencil-alt"></i>
                            </router-link>
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-3">
                            <a
                              class="btn btn-danger btn-sm"
                              @click="deleteProduct(product.id)"
                              href="#"
                            >
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
              <pagination :meta_data="getMetaData" v-on:next="fetchListOrders"></pagination>
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
    <model title="Invoice" size="modal-xl">
      <invoice />
    </model>
  </section>
  <!-- /.content -->
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import pagination from "@Admin/components/Pagination.vue";
import datatable from "@Admin/components/DataTable.vue";
import model from "@Admin/components/Model.vue";
import Invoice from "@Admin/views/Invoice";

export default {
  name: "OrderList",
  components: {
    pagination,
    datatable,
    model,
    Invoice
  },
  data() {
    return {
      columns: [
        { width: "2%", label: "#", name: "id", active: true },
        {
          width: "15%",
          label: "Customer Name",
          name: "customer_name",
          active: true
        },
        {
          width: "15%",
          label: "Grand Total",
          name: "grand_total",
          active: true
        },
        {
          width: "15%",
          label: "Payment Method",
          name: "payment_method",
          active: true
        },
        {
          width: "15%",
          label: "Payment Status",
          name: "payment_status",
          active: true
        },
        { width: "15%", label: "Order Status", name: "order_status", active: true },
        { width: "18%", label: "Date", name: "date", active: true },
        { width: "18%", label: "Action", name: "action", active: false }
      ]
    };
  },
  methods: {
    ...mapActions(["fetchListOrders", "setOrder", "deleteProduct"]),
    newModel(order) {
      this.setOrder(order);
      $("#addNew").modal("show");
    }
  },
  created() {
    this.fetchListOrders();
  },
  computed: mapGetters(["getAllOrders", "getMetaData"])
};
</script>
