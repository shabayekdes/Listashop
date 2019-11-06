<template>
  <table
    id="example2"
    class="table table-bordered table-striped dataTable"
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
    <tbody v-if="length">
      <slot></slot>
    </tbody>
    <tbody v-else>
      <tr>
        <td :colspan="columns.length" class="text-center">No Data Avialable</td>
      </tr>
    </tbody>
  </table>
</template>
<script>
export default {
  props: ["columns", "length"],
  methods: {}
};
</script>
