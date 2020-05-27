<template>
  <div v-if="hasError(field)" class="help-block invalid-feedback" v-html="getErrorMsg(field)" />
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  name: "has-error",
  props: {
    field: {
      type: String,
      required: true
    }
  },
  computed: mapGetters(["hasError", "getErrorMsg"])
};
</script>
