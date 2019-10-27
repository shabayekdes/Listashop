<template>
  <div
    class="modal fade"
    id="addNew"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ title }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <slot></slot>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["title"]
};
</script>

<style>
</style>
