<template>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ $route.meta.text }}</h1>
        </div>
        <Breadcrumbs />
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
</template>

<script>
import Breadcrumbs from "@Admin/components/Breadcrumbs";
export default {
  name: "Wrapper",
  components: {
    Breadcrumbs
  }
};
</script>

<style>
</style>
