<template>
  <form @submit.prevent="mode ? patchCategory() : createCategory()" enctype="multipart/form-data">
    <div class="card-body">
      <div class="form-group">
        <label for="inputName">Category Name</label>
        <input
          type="text"
          v-model="getNewCategory.name"
          @change="setSlug"
          id="inputName"
          class="form-control"
          placeholder="Enter name of category ..."
        />
      </div>
      <div class="form-group">
        <label class="col-form-label" for="inlineFormInputGroup">Slug</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">category/</div>
          </div>
          <input
            type="text"
            v-model="getNewCategory.slug"
            class="form-control"
            id="inlineFormInputGroup"
            placeholder="Enter slug name ..."
          />
        </div>
      </div>
      <div class="form-group">
        <label>Categories</label>
        <select
          v-model="getNewCategory.parent_id"
          name="category_id"
          id="category_id"
          class="form-control"
        >
          <option value>Select category parent</option>
          <option
            v-for="category in getAllCategories"
            :value="category.id"
            :key="category.id"
          >{{ category.name }}</option>
        </select>
      </div>
      <div class="row mb-3">
        <div class="col-md-4 offset-md-4">
          <img
            class="img-thumbnail mx-auto"
            width="200"
            height="200"
            :src="getImage.url"
            alt="user image"
          />
        </div>
      </div>
      <div class="form-group">
        <div class="input-group mb-3">
          <div class="custom-file">
            <label
              class="custom-file-label"
              for="inputGroupFile02"
              aria-describedby="inputGroupFileAddon02"
            >{{ getImage.name }}</label>
            <input
              type="file"
              @change="uploadImage"
              class="custom-file-input"
              id="inputGroupFile02"
            />
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="inputDescription">Description</label>
        <textarea
          id="inputDescription"
          v-model="getNewCategory.description"
          class="form-control"
          rows="4"
        ></textarea>
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" v-if="mode" class="btn btn-success">Update</button>
      <button type="submit" v-else class="btn btn-primary">Submit</button>
      <button type="submit" v-show="mode" class="btn btn-primary" data-dismiss="modal">close</button>
    </div>
  </form>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  name: "form-category",
  props: ["mode"],
  methods: {
    ...mapActions([
      "storeCategory",
      "updateCategory",
      "uploadImage",
      "fetchListCategories"
    ]),
    createCategory() {
      this.storeCategory(this.getNewCategory);
    },
    patchCategory() {
      this.updateCategory(this.getNewCategory);
    },
    setSlug() {
      this.getNewCategory.slug = this.getNewCategory.name
        .toLowerCase()
        .replace(/[^\w ]+/g, "")
        .replace(/ +/g, "-");
    }
  },
  watch: {
    getImage: {
      handler: function(val, oldVal) {
        this.getNewCategory.image = val.url;
      },
      deep: true
    }
  },
  computed: mapGetters(["getNewCategory", "getAllCategories", "getImage"])
};
</script>

<style scoped>
.custom-file-label {
  font-size: 14px;
}
</style>
