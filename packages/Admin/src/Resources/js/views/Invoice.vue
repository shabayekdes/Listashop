<template>
  <div class="invoice p-3 mb-3">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h4>
          <i class="fas fa-globe"></i> AdminLTE, Inc.
          <small class="float-right">Date: 2/10/2014</small>
        </h4>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong>Admin, Inc.</strong>

          <br />795 Folsom Ave, Suite 600
          <br />San Francisco, CA 94107
          <br />Phone: (804) 123-5432
          <br />Email: info@almasaeedstudio.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong v-if="getSingleOrder.is_guest">{{ getSingleOrder.customer_name }}</strong>
          <strong v-else>{{ getSingleOrder.user.name }}</strong>
          <br />795 Folsom Ave, Suite 600
          <br />San Francisco, CA 94107
          <br />Phone: (555) 539-1037
          <br />Email: john.doe@example.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Invoice #{{ getSingleOrder.sku }}</b>
        <br />
        <br />
        <b>Order ID:</b>
        {{ getSingleOrder.id }}
        <br />
        <b>Payment Due:</b> 2/22/2014
        <br />
        <b>Account:</b> 968-34567
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

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
      <!-- accepted payments column -->
      <div class="col-6">
        <p class="lead">Payment Methods:</p>
        <img src="/img/credit/visa.png" alt="Visa" />
        <img src="/img/credit/mastercard.png" alt="Mastercard" />
        <img src="/img/credit/american-express.png" alt="American Express" />
        <img src="/img/credit/paypal2.png" alt="Paypal" />

        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
          plugg
          dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
        </p>
      </div>
      <!-- /.col -->
      <div class="col-6">
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

    <!-- this row will not appear when printing -->
    <div class="row no-print">
      <div class="col-12">
        <a href="invoice-print.html" target="_blank" class="btn btn-default">
          <i class="fas fa-print"></i> Print
        </a>
        <button type="button" class="btn btn-success float-right">
          <i class="far fa-credit-card"></i> Submit
          Payment
        </button>
        <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
          <i class="fas fa-download"></i> Generate PDF
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  name: "Invoice",
  computed: mapGetters(["getSingleOrder"])
};
</script>
