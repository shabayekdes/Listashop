<template>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
              <div class="row">
                  <div class="col-md-4" id="sidebar-setting">
                        <div class="card" v-for="(setting, index) in getAllSettings" :key="setting.id" :class="{'collapsed-card' : index > 0, 'card-outline card-primary' : index === 0 }" v-show="setting.children_setting_groups.length > 0">
                            <div class="card-header">
                                <h3 class="card-title">{{ setting.title }}</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a v-for="(childSetting, indexChild) in setting.children_setting_groups" :key="childSetting.id" class="nav-link" :class="{'active' : index === 0 && indexChild === 0}" :id="'v-pills-' + slugify( childSetting.title ) + '-tab'" data-toggle="pill" :href="'#v-pills-' + slugify( childSetting.title )" role="tab" :aria-controls="'v-pills-' + slugify( childSetting.title )" aria-selected="true">{{ childSetting.title }}</a>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                  </div>
                  <div class="col-md-8" id="tabs-setting">
                        <form role="form" @submit.prevent="patchSetting">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div v-for="(setting, index) in getAllChildSettings" :key="setting.id" :class="{'show active' : index === 0 }" class="tab-pane fade" :id="'v-pills-' + slugify( setting.title )" role="tabpanel" :aria-labelledby="'v-pills-' + slugify( setting.title ) + '-tab'">
                                    <div class="card-header">
                                        <h3 class="card-title">{{ setting.title }}</h3>
                                        <p class="card-text">{{ setting.description }}</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group" v-for="settingField in setting.settings" :key="settingField.id">
                                            <component :is="componentName(settingField.type)" :field="settingField"></component>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update setting</button>
                            </div>
                        </form>
                  </div>
              </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</template>
<script>
import { mapGetters, mapActions } from "vuex";
import formInput from "@Admin/pages/setting/fields/Input";
import formSelect from "@Admin/pages/setting/fields/Select";
import formCheckbox from "@Admin/pages/setting/fields/Checkbox";
import formTextarea from "@Admin/pages/setting/fields/Textarea";

export default {
  name: "AppSettings",
    components: {
    formInput,
    formCheckbox,
    formTextarea,
    formSelect
  },
  data() {
    return {};
  },
  methods: {
    ...mapActions([
      "fetchListSettings",
      "updateSetting"
    ]),
    patchSetting(){

      this.updateSetting(this.getSingleSetting);
    },
    componentName(field) {
        switch (field) {
            case 'email':
            case 'text':
                  return "form-input";
                break;
            case 'select':
                    return "form-select";
                break; 
            case 'checkbox':
                  return "form-checkbox";
                break;   
            case 'textarea':
                  return "form-textarea";
                break;             
            default:
                break;
        }
    }
  },
  created() {
    this.fetchListSettings();
  },
  computed: mapGetters(["getAllSettings", "getAllChildSettings", "getAllChildSettings", "getSingleSetting"])
};
</script>
<style scoped>
#sidebar-setting .card{
    margin-bottom: 0 !important;
}
</style>
