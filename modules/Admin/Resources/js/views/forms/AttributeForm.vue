<template>
  <form @submit.prevent="getMode ?patchAttribute() : createAttribute()">
    <div class="card-body">
      <div class="form-group">
        <label for="inputName">Attribute Name</label>
        <input
          type="text"
          v-model="getSingleAttribute.name"
          id="inputName"
          class="form-control"
          :class="{ 'is-invalid': hasError('name') }"
          placeholder="Enter name of attribute ..."
        />
        <has-error field="name"></has-error>
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" v-if="getMode" class="btn btn-success">Update</button>
      <button type="submit" v-else class="btn btn-primary">Submit</button>
      <button type="submit" v-show="getMode" class="btn btn-primary" data-dismiss="modal">close</button>
    </div>
  </form>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import HasError from "@Admin/components/HasError.vue";

export default {
  name: "formAttribute",
  components: {
    HasError
  },
  methods: {
    ...mapActions(["storeAttribute", "updateAttribute", "setError"]),
    createAttribute() {
      this.storeAttribute(this.getSingleAttribute);
    },
    patchAttribute() {
      this.updateAttribute(this.getSingleAttribute);
    }
  },
  watch: {
    getSingleAttribute: {
      handler: function(val, oldVal) {
        this.setError({ errors: null });
      },
      deep: true
    }
  },
  computed: mapGetters(["getSingleAttribute", "getMode", "hasError"])
};
</script>

<style scoped>
.custom-file-label {
  font-size: 14px;
}
</style>
