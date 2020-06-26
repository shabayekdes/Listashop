<template>
    <div class="row">
        <label :for="field.setting_key" class="col-sm-4 col-form-label">{{ field.attributes.label }}</label>
        <div class="col-sm-8">
            <select :id="field.setting_key" v-model="getSingleSetting[field.setting_key]" class="form-control">
                <option selected>Choose...</option>
                <option v-for="option in field.attributes.options" :key="option.value" :value="option.value">{{ option.text }}</option>
            </select>
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
