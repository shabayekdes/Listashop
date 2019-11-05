<template>
  <form
    @submit.prevent="getMode ? patchCategory() : createCategory()"
    enctype="multipart/form-data"
  >
    <div class="card-body">
      <div class="form-group">
        <label for="inputName">Category Name</label>
        <input
          type="text"
          v-model="getSingleCategory.name"
          @change="setSlug"
          id="inputName"
          class="form-control"
          :class="{ 'is-invalid': hasError('name') }"
          placeholder="Enter name of category ..."
        />
        <has-error field="name"></has-error>
      </div>
      <div class="form-group">
        <label class="col-form-label" for="inlineFormInputGroup">Slug</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">category/</div>
          </div>
          <input
            type="text"
            v-model="getSingleCategory.slug"
            class="form-control"
            :class="{ 'is-invalid': hasError('slug') }"
            id="inlineFormInputGroup"
            placeholder="Enter slug name ..."
          />
          <has-error field="slug"></has-error>
        </div>
      </div>
      <div class="form-group">
        <label>Categories</label>
        <select
          v-model="getSingleCategory.parent_id"
          name="category_id"
          id="category_id"
          class="custom-select"
          :class="{ 'is-invalid': hasError('parent_id') }"
        >
          <option value>Select one category</option>
          <option
            v-for="category in getAllCategories"
            :value="category.id"
            :key="category.id"
          >{{ category.name }}</option>
        </select>
        <has-error field="parent_id"></has-error>
      </div>
      <div class="row mb-3">
        <div class="col-md-4 offset-md-4">
          <img
            class="img-thumbnail mx-auto"
            width="200"
            height="200"
            :src="getThumb.url"
            alt="user image"
          />
        </div>
      </div>

      <div class="custom-file mb-3">
        <input
          type="file"
          @change="addThumb"
          class="custom-file-input"
          id="validatedCustomFile"
          :class="{ 'is-invalid': hasError('image') }"
        />
        <label class="custom-file-label" for="inputGroupFile02">{{ truncate(getThumb.name,20) }}</label>
        <has-error field="image"></has-error>
      </div>

      <div class="form-group">
        <label for="inputDescription">Description</label>
        <textarea
          id="inputDescription"
          v-model="getSingleCategory.description"
          class="form-control"
          :class="{ 'is-invalid': hasError('description') }"
          rows="4"
        ></textarea>
        <has-error field="description"></has-error>
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
  name: "form-category",
  components: {
    HasError
  },
  methods: {
    ...mapActions([
      "storeCategory",
      "updateCategory",
      "addThumb",
      "resetImages",
      "fetchListCategories",
      "setError"
    ]),
    createCategory() {
      const formData = new FormData();
      for (const [key, value] of Object.entries(this.getSingleCategory)) {
        formData.append(key, value);
      }
      if (this.getThumb.file) {
        formData.append("image", this.getThumb.file, this.getThumb.name);
      }
      this.storeCategory(formData);
    },
    patchCategory() {
      this.updateCategory(this.getSingleCategory);
    },
    setSlug() {
      this.getSingleCategory.slug = this.getSingleCategory.name
        .toLowerCase()
        .replace(/[^\w ]+/g, "")
        .replace(/ +/g, "-");
    }
  },
  watch: {
    getSingleCategory: {
      handler: function(val, oldVal) {
        this.setError({ errors: null });
      },
      deep: true
    },
    getStatus(val, oldVal) {
      if (val == "ok") {
        this.resetImages();
      }
    }
  },
  computed: mapGetters([
    "getSingleCategory",
    "getAllCategories",
    "getThumb",
    "getMode",
    "getStatus",
    "hasError"
  ])
};
</script>

<style scoped>
.custom-file-label {
  font-size: 14px;
}
</style>
