<template>
  <div class="content-wrapper" style="min-height: 971.94px;">
    <!-- Content Header (Page header) -->
    <Header />
    <!-- Main content -->
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
import Header from "@Admin/layouts/Header";
export default {
  name: "Wrapper",
  components: {
    Header
  }
};
</script>
