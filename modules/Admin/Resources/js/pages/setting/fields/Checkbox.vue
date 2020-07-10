<template>
    <div class="form-group row">
    <div class="col-sm-2">{{ field.attributes.name }}</div>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" v-model="getSingleSetting[field.setting_key]" id="gridCheck1">
        <label class="form-check-label" for="gridCheck1">
          {{ field.attributes.label }}
        </label>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  props: ["field"],
  computed: mapGetters(["getSingleSetting"])
};
</script>