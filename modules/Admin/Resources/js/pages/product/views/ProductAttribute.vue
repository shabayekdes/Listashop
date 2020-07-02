<template>
<div class="row">
	<div class="col-3">
		<div
		class="nav flex-column nav-pills"
		id="v-pills-tab"
		role="tablist"
		aria-orientation="vertical"
		>
		<a
			class="nav-link active"
			id="v-pills-home-tab"
			data-toggle="pill"
			href="#v-pills-home"
			role="tab"
			aria-controls="v-pills-home"
			aria-selected="true"
		>General</a>
		<a
			class="nav-link"
			id="v-pills-shipping-tab"
			data-toggle="pill"
			href="#v-pills-shipping"
			role="tab"
			aria-controls="v-pills-shipping"
			aria-selected="false"
		>Shipping</a>
		<a
			class="nav-link"
			id="v-pills-inventory-tab"
			data-toggle="pill"
			href="#v-pills-inventory"
			role="tab"
			aria-controls="v-pills-inventory"
			aria-selected="false"
		>Inventory</a>
		<a
			class="nav-link"
			id="v-pills-attribute-tab"
			data-toggle="pill"
			href="#v-pills-attribute"
			role="tab"
			aria-controls="v-pills-attribute"
			aria-selected="false"
		>Options</a>
		<!-- <a
			class="nav-link"
			id="v-pills-variations-tab"
			data-toggle="pill"
			href="#v-pills-variations"
			role="tab"
			aria-controls="v-pills-variations"
			aria-selected="false"
		>Variations</a> -->
		</div>
	</div>
	<div class="col-9">
		<div class="tab-content" id="v-pills-tabContent">
			<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
				<div class="card">
					<div class="card-body">
					<div class="form-group row">
						<label
						for="colFormLabelSm"
						class="col-sm-2 col-form-label col-form-label-sm"
						>Price (EGP)</label>
						<div class="col-sm-6">
						<input
							type="number"
							v-model="getSingleProduct.price"
							class="form-control form-control-sm"
							id="colFormLabelSm"
							:class="{ 'is-invalid': hasError('price') }"
						/>
						<has-error field="price"></has-error>
						</div>
					</div>
					<div class="form-group row">
						<label
						for="colFormLabelSm"
						class="col-sm-2 col-form-label col-form-label-sm"
						>Cost (EGP)</label>
						<div class="col-sm-6">
						<input
							type="number"
							v-model="getSingleProduct.cost"
							class="form-control form-control-sm"
							id="colFormLabelSm"
							:class="{ 'is-invalid': hasError('cost') }"
						/>
						<has-error field="cost"></has-error>
						</div>
					</div>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- <div class="tab-pane fade" id="v-pills-shipping" role="tabpanel" aria-labelledby="v-pills-shipping-tab">shipping</div> -->
			<div class="tab-pane fade" id="v-pills-inventory" role="tabpanel" aria-labelledby="v-pills-inventory-tab">
				<div class="card">
					<div class="card-body">
					<div class="form-group row">
						<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">SKU</label>
						<div class="col-sm-6">
						<input
							type="text"
							v-model="getSingleProduct.sku"
							class="form-control form-control-sm"
							id="colFormLabelSm"
							:class="{ 'is-invalid': hasError('sku') }"
						/>
						<small
							id="emailHelp"
							class="form-text text-muted"
						>Keep it blank to automatically generate sku.</small>
						<has-error field="sku"></has-error>
						</div>
					</div>
					<div class="form-group row">
						<label
						for="colFormLabelSm"
						class="col-sm-2 col-form-label col-form-label-sm"
						>Stock status</label>
						<div class="col-sm-6">
						<select class="form-control" id="exampleFormControlSelect1">
							<option>In stock</option>
							<option>Out of stock</option>
						</select>
						<has-error field="cost"></has-error>
						</div>
					</div>
					<div class="form-group row">
						<label
						for="colFormLabelSm"
						class="col-sm-2 col-form-label col-form-label-sm"
						>Stock quantity</label>
						<div class="col-sm-6">
						<input
							type="number"
							v-model="getSingleProduct.quantity"
							class="form-control form-control-sm"
							id="colFormLabelSm"
							:class="{ 'is-invalid': hasError('quantity') }"
						/>
						<has-error field="quantity"></has-error>
						</div>
					</div>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<div class="tab-pane fade" id="v-pills-attribute" role="tabpanel" aria-labelledby="v-pills-attribute-tab">     
				<div class="card collapsed-card" v-for="selectedOption in getSelectedOptions" :key="selectedOption.id">
					<div class="card-header">
						<h3 class="card-title">{{ selectedOption.name }}</h3>

						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse">
								<i class="fas fa-plus"></i>
							</button>
							<a href="avascript:void(0)" @click="removeSelectedOption(selectedOption)" class="btn btn-tool" data-card-widget="remove">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<!-- /.card-tools -->
					</div>
					<!-- /.card-header -->
					<div class="card-body" style="display: none;">
						<div class="info-box bg-gradient-info">
						<div class="info-box-content">
							<div class="d-flex bd-highlight">
							<div class="mr-auto p-2 bd-highlight">
								<h5>Option name</h5>
								<p>{{ selectedOption.name }}</p>
							</div>
							<div class="mr-auto p-2 bd-highlight">
								<h5>Type</h5>
								<p>{{ selectedOption.type }}</p>
							</div>
							<div class="align-self-center p-2 bd-highlight">
								<div class="form-check">
								<input class="form-check-input" type="checkbox" v-model="selectedOption.is_require" />
								<label class="form-check-label">Required</label>
								</div>
							</div>
							</div>
						</div>
						<!-- /.info-box-content -->
						</div>

						<table class="table table-condensed">
						<thead>
							<tr>
								<th>#</th>
								<th>Value</th>
								<th>Price</th>
								<th>Price Type</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="selectedOptionValue in selectedOption.values" :key="selectedOptionValue.id">
								<td>{{ selectedOptionValue.id }}</td>
								<td>
									{{ selectedOptionValue.value }}
								</td>
								<td>
									<input class="form-control" v-model="selectedOptionValue.price" type="number" />
								</td>
								<td>
									<select class="form-control" v-model="selectedOptionValue.price_type" id="type">
										<option value="fixed">Fixed</option>
										<option value="percent">Percent</option>
									</select>
								</td>
								<td>
									<a href="javascript:void(0)" @click="removeSelectedOptionValue(selectedOptionValue)" class="btn btn-default btn-sm">
										<i class="fas fa-trash-alt"></i>
									</a>
								</td>
							</tr>
							<a href="" class="btn btn-primary btn-block mt-3" data-toggle="modal" data-target="#addNewOptionValueModal">Add new value</a>
						</tbody>
						</table>
					</div>
					<!-- /.card-body -->
					<!-- Modal -->
					<div class="modal fade" id="addNewOptionValueModal" tabindex="-1" role="dialog" aria-labelledby="addNewOptionValueLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="form-group">
										<label for="exampleFormControlInput1">Label value</label>
										<input
											type="text"
											v-model="newOptionValue"
											class="form-control"
											placeholder="Enter value name ..."
										/>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<a href="javascript:void(0)" class="btn btn-primary" @click.prevent="addOptionValue(selectedOption.id)">Save changes</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card">
					<div class="card-body">
						<div class="d-flex bd-highlight mb-3">
							<div class="p-2 bd-highlight"><label for="staticEmail" class="col-form-label">Options</label></div>
							<div class="p-2 bd-highlight">
								<select class="form-control" v-model="selectOption" id="exampleFormControlSelect1">
								<option value disabled>Select one option</option>
								<option
									v-for="option in getAllOptions"
									:key="option.id"
									:value="option"
								>{{ option.name }}</option>
								</select>
							</div>
							<div class="ml-auto p-2 bd-highlight">
								<a href="javascript:void(0)" class="btn btn-primary" @click="addSelectedOption()">
									<i class="fas fa-plus"></i>
								</a>
							</div>
						</div>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
		</div>
	</div>
</div>
</template>

<script>
import { mapGetters, mapActions, mapMutations } from "vuex";
import ProductVariation from "@Admin/views/forms/ProductVariation";
import HasError from "@Admin/components/HasError.vue";
import Multiselect from 'vue-multiselect'

export default {
  name: "ProductConfigurable",
  components: {
    ProductVariation,
    HasError,
    Multiselect
  },
  data() {
    return {
	  selectOption: "",
	  newOptionValue: "",
      selected: null,
        options: ['list', 'of', 'options']
    };
  },
  methods: {
    ...mapActions([
		"removeSelectedAttr", 
		"fetchListOptions",
		"addSelectedOptions",
		"storeOptionValue",
		"removeSelectedOption",
		"removeSelectedOptionValue",
		"setError"
	]),
    // ...mapMutations(["REMOVE_VARIATION", "SET_VARIATION", "RESET_OPTIONS"]),
    cartesian() {
      var r = [],
        arg = arguments,
        max = arg.length - 1;
      function helper(arr, i) {
        for (var j = 0, l = arg[i].length; j < l; j++) {
          var a = arr.slice(0); // clone arr
          a.push(arg[i][j]);
          if (i == max) r.push({ attributes: a });
          else helper(a, i + 1);
        }
      }
      helper([], 0);
    //   this.SET_VARIATION(r);
      return r;
	},
	addSelectedOption(){
		this.addSelectedOptions(this.selectOption)
		this.selectOption = ""
	},
	addOptionValue(id){
		this.storeOptionValue({
			option_id: id,
			value: this.newOptionValue
		})
	}
  },
  watch: {
    // getSelectedAttr(val, oldVal) {
    //   this.RESET_OPTIONS();
    //   val.map(attr => {
    //     this.getAllOptions.push(attr.options);
    //   });
    //   if (this.getAllOptions.length > 0) {
    //     this.cartesian(...this.getAllOptions);
    //   } else {
    //     this.REMOVE_VARIATION([]);
    //   }
    // }
  },
  computed: mapGetters([
    "getSingleProduct",
    "getAllOptions",
    // "getAllAttributes",
    "getSelectedOptions",
    "hasError"
  ])
};
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
