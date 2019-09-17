<template>
  <div class="row">
    <div class="col-sm-12 col-md-5">
      <div
        class="dataTables_info"
        id="example1_info"
        role="status"
        aria-live="polite"
      >Showing {{ meta_data.current_page }} to {{ meta_data.to }} of {{ meta_data.total }} entries</div>
    </div>
    <div class="col-sm-12 col-md-7" v-if="meta_data.last_page > 1">
      <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
        <ul class="pagination pagination-sm m-0 float-right">
          <li class="page-item" :class="{ 'disabled': meta_data.prev_page_url === null }">
            <a href="#" class="page-link" @click="next(meta_data.current_page-1)">&laquo; Prev</a>
          </li>
          <li
            class="page-item"
            v-for="page in meta_data.last_page"
            :key="page"
            :class="{ 'active':meta_data.current_page === page }"
          >
            <a href="#" @click.prevent="next(page)" class="page-link">{{ page }}</a>
          </li>
          <li
            class="page-item"
            :class="{ 'disabled': meta_data.current_page === meta_data.last_page }"
          >
            <a href="#" class="page-link" @click="next(meta_data.current_page+1)">&raquo; Next</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["meta_data"],
  methods: {
    next(page) {
      this.$emit("next", page);
    }
  }
};
</script>
