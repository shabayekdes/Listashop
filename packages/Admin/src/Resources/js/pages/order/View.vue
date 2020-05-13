<template>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-6">
        <div class="card card-outline card-primary">
          <div class="card-header">
            <h3 class="card-title">Customer Information</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            To
            <address>
              <strong v-if="getSingleOrder.is_guest">{{ getSingleOrder.customer_name }}</strong>
              <strong v-else>{{ getSingleOrder.user.name }}</strong>
              <br />795 Folsom Ave, Suite 600
              <br />San Francisco, CA 94107
              <br />Phone: (555) 539-1037
              <br />Email: john.doe@example.com
            </address>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card card-outline card-primary">
          <div class="card-body">
            <p class="lead">Order Information</p>
            <div class="table-responsive">
              <table class="table">
                <tbody>
                  <tr>
                    <th style="width:50%">Invoice:</th>
                    <td>{{ getSingleOrder.key }}</td>
                  </tr>
                  <tr>
                    <th>
                      <b>Order ID:</b>
                    </th>
                    <td>#OR{{ getSingleOrder.id }}</td>
                  </tr>
                  <tr>
                    <th>
                      <b>Payment Due:</b>
                    </th>
                    <td>{{ getSingleOrder.created_at }}</td>
                  </tr>
                  <tr>
                    <th>
                      <b>Order Status:</b>
                    </th>
                    <td>{{ getSingleOrder.order_status }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <button type="button" class="btn btn-success">
              <i class="fas fa-stopwatch"></i> Update Status
            </button>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Order Items</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="invoice p-3 mb-3">
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Qty</th>
                        <th>Product</th>
                        <th>SKU #</th>
                        <th>Description</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr></tr>
                      <tr v-for="product in getSingleOrder.products" :key="product.id">
                        <td>{{ product.quantity }}</td>
                        <td>{{ product.name }}</td>
                        <td>{{ product.sku }}</td>
                        <td>{{ product.description }}</td>
                        <td>{{ product.price * product.quantity }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <div class="col-6 offset-6">
                  <p class="lead">Amount Due 2/22/2014</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th style="width:50%">Subtotal:</th>
                          <td>$250.30</td>
                        </tr>
                        <tr>
                          <th>Tax (9.3%)</th>
                          <td>$10.34</td>
                        </tr>
                        <tr>
                          <th>Shipping:</th>
                          <td>$5.80</td>
                        </tr>
                        <tr>
                          <th>Total:</th>
                          <td>{{ getSingleOrder.total }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
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

export default {
  name: "ViewOrder",
  methods: {
    ...mapActions(["showOrder"])
  },
  created() {
    this.showOrder(this.$route.params.id);
  },
  computed: mapGetters(["getSingleOrder"])
};
</script>
