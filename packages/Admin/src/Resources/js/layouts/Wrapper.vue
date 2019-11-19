<template>
  <div class="content-wrapper" style="min-height: 971.94px;">
    <!-- Content Header (Page header) -->
    <Header />
    <!-- Main content -->
    <!-- <loading v-show="getLoading" /> -->
    <!-- <router-view v-show="!getLoading"></router-view> -->
    <router-view></router-view>
    <!-- /.content -->
    <!-- <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="#">About</a>
      <a href="#">Services</a>
      <a href="#">Clients</a>
      <a href="#">Contact</a>
    </div>


    <span onclick="openNav()">open</span>-->
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import Header from "@Admin/layouts/Header";
import Loading from "@Admin/views/Loading";

export default {
  name: "Wrapper",
  components: {
    Header,
    Loading
  },
  computed: mapGetters(["getLoading"])
};
</script>
