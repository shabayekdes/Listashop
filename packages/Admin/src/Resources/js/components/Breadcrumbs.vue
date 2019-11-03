<template>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item" v-for="route in $route.matched" :key="route.name">
        <router-link :to="route.path">{{ route.meta.text }}</router-link>
      </li>
    </ol>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>
