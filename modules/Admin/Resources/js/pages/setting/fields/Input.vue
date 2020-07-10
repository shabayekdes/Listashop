<template>
    <div class="row">
        <label :for="field.setting_key" class="col-sm-4 col-form-label">{{ field.attributes.label }}</label>
        <div class="col-sm-8">
        <input :type="field.type" v-model="getSingleSetting[field.setting_key]" class="form-control" :id="field.setting_key">
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
