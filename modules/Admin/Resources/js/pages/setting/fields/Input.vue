<template>
    <div class="row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">{{ field.label }}</label>
        <div class="col-sm-10">
        <input :type="field.type" class="form-control" :id="field.id">
        </div>
    </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  props: ["field"],
};
</script>
