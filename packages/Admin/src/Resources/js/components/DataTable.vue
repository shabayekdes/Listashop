<template>
  <table
    id="example2"
    class="table table-bordered table-hover dataTable"
    role="grid"
    aria-describedby="example2_info"
  >
    <thead>
      <tr role="row">
        <th
          v-for="column in columns"
          :key="column.name"
          @click.prevent="sort(column.name)"
          :class="{ sorting: column.active }"
          :style="{ 'width' : column.width }"
        >{{column.label}}</th>
      </tr>
    </thead>
    <slot></slot>
  </table>
</template>
<script>
export default {
  props: ["columns"],
  methods: {}
};
</script>
