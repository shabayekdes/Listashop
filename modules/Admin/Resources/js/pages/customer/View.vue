<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img
                  class="profile-user-img img-fluid img-circle"
                  src="/img/user.svg"
                  alt="User profile picture"
                />
              </div>
              <h3 class="profile-username text-center">{{ getSingleCustomer.name }}</h3>

              <p class="text-muted text-center">{{ getSingleCustomer.status_label }}</p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- About Box -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">About</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <strong>
                <i class="fas fa-book mr-1"></i> Email
              </strong>

              <p class="text-muted">{{ getSingleCustomer.email }}</p>

              <hr />

              <strong>
                <i class="fas fa-map-marker-alt mr-1"></i> Phone Number
              </strong>

              <p class="text-muted">{{ getSingleCustomer.phone }}</p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item">
                  <a class="nav-link active" href="#activity" data-toggle="tab">Activity</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#address" data-toggle="tab">Address</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#settings" data-toggle="tab">Settings</a>
                </li>
              </ul>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">...</div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="address">
                  <h3>( {{ getSingleCustomerAddress.length }} ) address(es) registered</h3>
                  <div
                    class="card mb-3 mt-2"
                    v-for="address in getSingleCustomerAddress"
                    :key="address.id"
                  >
                    <div class="card-body">
                      <div class="d-flex bd-highlight">
                        <div class="p-2 flex-grow-1 bd-highlight">
                          <div><b>Address:</b> {{ address.address }}</div>
                          <div>
                            <b>State:</b> {{ address.state }}, <b>City:</b> {{ address.city }},
                            <b>Postal Code:</b> {{ address.postcode }}
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Card Body -->
                  </div>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="settings">...</div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import pagination from "@Admin/components/Pagination.vue";
import datatable from "@Admin/components/DataTable.vue";

export default {
  name: "Users",
  components: {
    pagination,
    datatable
  },
  data() {
    return {
      columns: [
        { width: "2%", label: "#", name: "id", active: true },
        { width: "20%", label: "Name", name: "name", active: true },
        { width: "40%", label: "Email", name: "email", active: true },
        { width: "20%", label: "Phone", name: "phone", active: true },
        { width: "18%", label: "Action", name: "action", active: false }
      ]
    };
  },
  methods: {
    ...mapActions(["showCustomer"])
  },
  created() {
    this.showCustomer(this.$route.params.id);
  },
  computed: mapGetters(["getSingleCustomer", "getSingleCustomerAddress"])
};
</script>
