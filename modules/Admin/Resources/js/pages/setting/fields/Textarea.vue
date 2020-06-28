<template>
<div class="row">
    <label :for="field.setting_key" class="col-sm-4 col-form-label">{{ field.attributes.label }}</label>
    <div class="col-sm-8">
        <textarea class="form-control" v-model="getSingleSetting[field.setting_key]" :id="field.setting_key" rows="3" placeholder="add multiple lines"></textarea>
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