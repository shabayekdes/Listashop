<template>
  <div class="content-wrapper" style="min-height: 971.94px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
<form method="POST" action="https://pos.ultimatefosters.com/products" accept-charset="UTF-8" id="product_add_form" class="product_form create" enctype="multipart/form-data"><input name="_token" type="hidden" value="BtQqvIEZrRqL81e1YkIxntSSsoA9HSD5IBSo1ozk">
    <div class="box box-primary">
                
    <div class="box-body">
        <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="name">Product Name:*</label>
              <input class="form-control" required="" placeholder="Product Name" name="name" type="text" id="name">
          </div>
        </div>

        <div class="col-sm-4">
          <div class="form-group">
            <label for="sku">SKU:</label> <i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" data-container="body" data-toggle="popover" data-placement="auto bottom" data-content="Unique product id or Stock Keeping Unit <br><br>Keep it blank to automatically generate sku.<br><small class='text-muted'>You can modify sku prefix in Business settings.</small>" data-html="true" data-trigger="hover" data-original-title="" title=""></i>            <input class="form-control" placeholder="SKU" name="sku" type="text" id="sku">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="barcode_type">Barcode Type:*</label>
              <select class="form-control select2 select2-hidden-accessible" required="" id="barcode_type" name="barcode_type" tabindex="-1" aria-hidden="true"><option value="C128" selected="selected">Code 128 (C128)</option><option value="C39">Code 39 (C39)</option><option value="EAN13">EAN-13</option><option value="EAN8">EAN-8</option><option value="UPCA">UPC-A</option><option value="UPCE">UPC-E</option></select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 498px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-barcode_type-container"><span class="select2-selection__rendered" id="select2-barcode_type-container" title="Code 128 (C128)">Code 128 (C128)</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
          </div>
        </div>

      <div class="clearfix"></div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="unit_id">Unit:*</label>
            <div class="input-group">
              <select class="form-control select2 select2-hidden-accessible" required="" id="unit_id" name="unit_id" tabindex="-1" aria-hidden="true"><option value="" selected="selected">Please Select</option><option value="1">Pieces (Pc(s))</option><option value="2">Packets (packets)</option><option value="3">Grams (g)</option></select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 456px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-unit_id-container"><span class="select2-selection__rendered" id="select2-unit_id-container" title="Please Select">Please Select</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
              <span class="input-group-btn">
                <button type="button" class="btn btn-default bg-white btn-flat btn-modal" data-href="https://pos.ultimatefosters.com/units/create?quick_add=1" title="Add Unit" data-container=".view_modal"><i class="fa fa-plus-circle text-primary fa-lg"></i></button>
              </span>
            </div>
          </div>
        </div>
        
        <div class="col-sm-4  hide ">
          <div class="form-group">
            <label for="sub_unit_ids">Related Sub Units:</label> <i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" data-container="body" data-toggle="popover" data-placement="auto bottom" data-content="Based on selected Unit it will show sub units for it. Select the sub-unit applicable. Leave blank if all sub-units are applicable for the product." data-html="true" data-trigger="hover"></i>
            <select class="form-control select2 select2-hidden-accessible" multiple="" id="sub_unit_ids" name="sub_unit_ids[]" tabindex="-1" aria-hidden="true"></select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
          </div>
        </div>

        <div class="col-sm-4 ">
          <div class="form-group">
            <label for="brand_id">Brand:</label>
            <div class="input-group">
              <select class="form-control select2 select2-hidden-accessible" id="brand_id" name="brand_id" tabindex="-1" aria-hidden="true"><option selected="selected" value="">Please Select</option><option value="1">Levis</option><option value="2">Espirit</option><option value="3">U.S. Polo Assn.</option><option value="4">Nike</option><option value="5">Puma</option><option value="6">Adidas</option><option value="7">Samsung</option><option value="8">Apple</option><option value="9">Acer</option><option value="10">Bowflex</option><option value="11">Oreo</option><option value="12">Sharewood</option><option value="13">Barilla</option><option value="14">Lipton</option></select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 456px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-brand_id-container"><span class="select2-selection__rendered" id="select2-brand_id-container" title="Please Select">Please Select</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
            <span class="input-group-btn">
                <button type="button" class="btn btn-default bg-white btn-flat btn-modal" data-href="https://pos.ultimatefosters.com/brands/create?quick_add=1" title="Add brand" data-container=".view_modal"><i class="fa fa-plus-circle text-primary fa-lg"></i></button>
              </span>
            </div>
          </div>
        </div>

        <div class="clearfix"></div>

        <div class="col-sm-4 ">
          <div class="form-group">
            <label for="category_id">Category:</label>
              <select class="form-control select2 select2-hidden-accessible" id="category_id" name="category_id" tabindex="-1" aria-hidden="true"><option selected="selected" value="">Please Select</option><option value="1">Men's</option><option value="2">Women's</option><option value="3">Accessories</option><option value="12">Electronics</option><option value="15">Sports</option><option value="18">Books</option><option value="21">Food &amp; Grocery</option></select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 498px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-category_id-container"><span class="select2-selection__rendered" id="select2-category_id-container" title="Please Select">Please Select</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
          </div>
        </div>

        <div class="col-sm-4 ">
          <div class="form-group">
            <label for="sub_category_id">Sub category:</label>
              <select class="form-control select2 select2-hidden-accessible" id="sub_category_id" name="sub_category_id" tabindex="-1" aria-hidden="true"><option selected="selected" value="">Please Select</option></select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 498px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-sub_category_id-container"><span class="select2-selection__rendered" id="select2-sub_category_id-container" title="Please Select">Please Select</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
          </div>
        </div>

        
        <div class="clearfix"></div>
        
        <div class="col-sm-4">
          <div class="form-group">
          <br>
            <label>
              <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false" style="position: relative;"><input class="input-icheck" id="enable_stock" checked="checked" name="enable_stock" type="checkbox" value="1" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> <strong>Manage Stock?</strong>
            </label><i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" data-container="body" data-toggle="popover" data-placement="auto bottom" data-content="Enable or disable stock management for a product. <br><br><small class='text-muted'>Stock Management should be disable mostly for services. Example: Hair-Cutting, Repairing, etc.</small>" data-html="true" data-trigger="hover"></i> <p class="help-block"><i>Enable stock management at product level</i></p>
          </div>
        </div>
        <div class="col-sm-4 " id="alert_quantity_div">
          <div class="form-group">
            <label for="alert_quantity">Alert quantity:*</label> <i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" data-container="body" data-toggle="popover" data-placement="auto bottom" data-content="Get alert when product stock reaches or goes below the specified quantity.<br><br><small class='text-muted'>Products with low stock will be displayed in dashboard - Product Stock Alert section.</small>" data-html="true" data-trigger="hover"></i>            <input class="form-control" required="" placeholder="Alert quantity" min="0" name="alert_quantity" type="number" id="alert_quantity">
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-8">
          <div class="form-group">
            <label for="product_description">Product Description:</label>
              <textarea class="form-control" name="product_description" cols="50" rows="10" id="product_description" style="visibility: hidden; display: none;"></textarea><div id="cke_product_description" class="cke_1 cke cke_reset cke_chrome cke_editor_product_description cke_ltr cke_browser_webkit" dir="ltr" lang="en" role="application" aria-labelledby="cke_product_description_arialbl"><span id="cke_product_description_arialbl" class="cke_voice_label">Rich Text Editor, product_description</span><div class="cke_inner cke_reset" role="presentation"><span id="cke_1_top" class="cke_top cke_reset_all" role="presentation" style="height: auto; user-select: none;"><span id="cke_12" class="cke_voice_label">Editor toolbars</span><span id="cke_1_toolbox" class="cke_toolbox" role="group" aria-labelledby="cke_12" onmousedown="return false;"><span class="cke_toolbar_break"></span><span id="cke_17" class="cke_toolbar" aria-labelledby="cke_17_label" role="toolbar"><span id="cke_17_label" class="cke_voice_label">Basic Styles</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_18" class="cke_button cke_button__bold cke_button_off" href="javascript:void('Bold')" title="Bold (Ctrl+B)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_18_label" aria-describedby="cke_18_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(2,event);" onfocus="return CKEDITOR.tools.callFunction(3,event);" onclick="CKEDITOR.tools.callFunction(4,this);return false;"><span class="cke_button_icon cke_button__bold_icon" style="background-image:url('https://pos.ultimatefosters.com/AdminLTE/plugins/ckeditor/plugins/icons.png?t=HBDD');background-position:0 -24px;background-size:auto;">&nbsp;</span><span id="cke_18_label" class="cke_button_label cke_button__bold_label" aria-hidden="false">Bold</span><span id="cke_18_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+B</span></a><a id="cke_19" class="cke_button cke_button__italic cke_button_off" href="javascript:void('Italic')" title="Italic (Ctrl+I)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_19_label" aria-describedby="cke_19_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(5,event);" onfocus="return CKEDITOR.tools.callFunction(6,event);" onclick="CKEDITOR.tools.callFunction(7,this);return false;"><span class="cke_button_icon cke_button__italic_icon" style="background-image:url('https://pos.ultimatefosters.com/AdminLTE/plugins/ckeditor/plugins/icons.png?t=HBDD');background-position:0 -48px;background-size:auto;">&nbsp;</span><span id="cke_19_label" class="cke_button_label cke_button__italic_label" aria-hidden="false">Italic</span><span id="cke_19_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+I</span></a><a id="cke_20" class="cke_button cke_button__underline cke_button_off" href="javascript:void('Underline')" title="Underline (Ctrl+U)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_20_label" aria-describedby="cke_20_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(8,event);" onfocus="return CKEDITOR.tools.callFunction(9,event);" onclick="CKEDITOR.tools.callFunction(10,this);return false;"><span class="cke_button_icon cke_button__underline_icon" style="background-image:url('https://pos.ultimatefosters.com/AdminLTE/plugins/ckeditor/plugins/icons.png?t=HBDD');background-position:0 -144px;background-size:auto;">&nbsp;</span><span id="cke_20_label" class="cke_button_label cke_button__underline_label" aria-hidden="false">Underline</span><span id="cke_20_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+U</span></a><a id="cke_21" class="cke_button cke_button__strike cke_button_off" href="javascript:void('Strikethrough')" title="Strikethrough" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_21_label" aria-describedby="cke_21_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(11,event);" onfocus="return CKEDITOR.tools.callFunction(12,event);" onclick="CKEDITOR.tools.callFunction(13,this);return false;"><span class="cke_button_icon cke_button__strike_icon" style="background-image:url('https://pos.ultimatefosters.com/AdminLTE/plugins/ckeditor/plugins/icons.png?t=HBDD');background-position:0 -72px;background-size:auto;">&nbsp;</span><span id="cke_21_label" class="cke_button_label cke_button__strike_label" aria-hidden="false">Strikethrough</span><span id="cke_21_description" class="cke_button_label" aria-hidden="false"></span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_22" class="cke_toolbar" aria-labelledby="cke_22_label" role="toolbar"><span id="cke_22_label" class="cke_voice_label">Paragraph</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_23" class="cke_button cke_button__justifyleft cke_button_off" href="javascript:void('Align Left')" title="Align Left" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_23_label" aria-describedby="cke_23_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(14,event);" onfocus="return CKEDITOR.tools.callFunction(15,event);" onclick="CKEDITOR.tools.callFunction(16,this);return false;"><span class="cke_button_icon cke_button__justifyleft_icon" style="background-image:url('https://pos.ultimatefosters.com/AdminLTE/plugins/ckeditor/plugins/icons.png?t=HBDD');background-position:0 -1152px;background-size:auto;">&nbsp;</span><span id="cke_23_label" class="cke_button_label cke_button__justifyleft_label" aria-hidden="false">Align Left</span><span id="cke_23_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_24" class="cke_button cke_button__justifycenter cke_button_off" href="javascript:void('Center')" title="Center" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_24_label" aria-describedby="cke_24_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(17,event);" onfocus="return CKEDITOR.tools.callFunction(18,event);" onclick="CKEDITOR.tools.callFunction(19,this);return false;"><span class="cke_button_icon cke_button__justifycenter_icon" style="background-image:url('https://pos.ultimatefosters.com/AdminLTE/plugins/ckeditor/plugins/icons.png?t=HBDD');background-position:0 -1128px;background-size:auto;">&nbsp;</span><span id="cke_24_label" class="cke_button_label cke_button__justifycenter_label" aria-hidden="false">Center</span><span id="cke_24_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_25" class="cke_button cke_button__justifyright cke_button_off" href="javascript:void('Align Right')" title="Align Right" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_25_label" aria-describedby="cke_25_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(20,event);" onfocus="return CKEDITOR.tools.callFunction(21,event);" onclick="CKEDITOR.tools.callFunction(22,this);return false;"><span class="cke_button_icon cke_button__justifyright_icon" style="background-image:url('https://pos.ultimatefosters.com/AdminLTE/plugins/ckeditor/plugins/icons.png?t=HBDD');background-position:0 -1176px;background-size:auto;">&nbsp;</span><span id="cke_25_label" class="cke_button_label cke_button__justifyright_label" aria-hidden="false">Align Right</span><span id="cke_25_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_26" class="cke_button cke_button__justifyblock cke_button_off" href="javascript:void('Justify')" title="Justify" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_26_label" aria-describedby="cke_26_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(23,event);" onfocus="return CKEDITOR.tools.callFunction(24,event);" onclick="CKEDITOR.tools.callFunction(25,this);return false;"><span class="cke_button_icon cke_button__justifyblock_icon" style="background-image:url('https://pos.ultimatefosters.com/AdminLTE/plugins/ckeditor/plugins/icons.png?t=HBDD');background-position:0 -1104px;background-size:auto;">&nbsp;</span><span id="cke_26_label" class="cke_button_label cke_button__justifyblock_label" aria-hidden="false">Justify</span><span id="cke_26_description" class="cke_button_label" aria-hidden="false"></span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_27" class="cke_toolbar" aria-labelledby="cke_27_label" role="toolbar"><span id="cke_27_label" class="cke_voice_label">Insert</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_28" class="cke_button cke_button__horizontalrule cke_button_off" href="javascript:void('Insert Horizontal Line')" title="Insert Horizontal Line" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_28_label" aria-describedby="cke_28_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(26,event);" onfocus="return CKEDITOR.tools.callFunction(27,event);" onclick="CKEDITOR.tools.callFunction(28,this);return false;"><span class="cke_button_icon cke_button__horizontalrule_icon" style="background-image:url('https://pos.ultimatefosters.com/AdminLTE/plugins/ckeditor/plugins/icons.png?t=HBDD');background-position:0 -912px;background-size:auto;">&nbsp;</span><span id="cke_28_label" class="cke_button_label cke_button__horizontalrule_label" aria-hidden="false">Insert Horizontal Line</span><span id="cke_28_description" class="cke_button_label" aria-hidden="false"></span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_29" class="cke_toolbar" aria-labelledby="cke_29_label" role="toolbar"><span id="cke_29_label" class="cke_voice_label">Styles</span><span class="cke_toolbar_start"></span><span id="cke_13" class="cke_combo cke_combo__styles cke_combo_off" role="presentation"><span id="cke_13_label" class="cke_combo_label">Styles</span><a class="cke_combo_button" title="Formatting Styles" tabindex="-1" href="javascript:void('Formatting Styles')" hidefocus="true" role="button" aria-labelledby="cke_13_label" aria-haspopup="true" onkeydown="return CKEDITOR.tools.callFunction(30,event,this);" onfocus="return CKEDITOR.tools.callFunction(31,event);" onclick="CKEDITOR.tools.callFunction(29,this);return false;"><span id="cke_13_text" class="cke_combo_text cke_combo_inlinelabel">Styles</span><span class="cke_combo_open"><span class="cke_combo_arrow"></span></span></a></span><span id="cke_14" class="cke_combo cke_combo__format cke_combo_off" role="presentation"><span id="cke_14_label" class="cke_combo_label">Format</span><a class="cke_combo_button" title="Paragraph Format" tabindex="-1" href="javascript:void('Paragraph Format')" hidefocus="true" role="button" aria-labelledby="cke_14_label" aria-haspopup="true" onkeydown="return CKEDITOR.tools.callFunction(33,event,this);" onfocus="return CKEDITOR.tools.callFunction(34,event);" onclick="CKEDITOR.tools.callFunction(32,this);return false;"><span id="cke_14_text" class="cke_combo_text cke_combo_inlinelabel">Format</span><span class="cke_combo_open"><span class="cke_combo_arrow"></span></span></a></span><span id="cke_15" class="cke_combo cke_combo__font cke_combo_off" role="presentation"><span id="cke_15_label" class="cke_combo_label">Font</span><a class="cke_combo_button" title="Font Name" tabindex="-1" href="javascript:void('Font Name')" hidefocus="true" role="button" aria-labelledby="cke_15_label" aria-haspopup="true" onkeydown="return CKEDITOR.tools.callFunction(36,event,this);" onfocus="return CKEDITOR.tools.callFunction(37,event);" onclick="CKEDITOR.tools.callFunction(35,this);return false;"><span id="cke_15_text" class="cke_combo_text cke_combo_inlinelabel">Font</span><span class="cke_combo_open"><span class="cke_combo_arrow"></span></span></a></span><span id="cke_16" class="cke_combo cke_combo__fontsize cke_combo_off" role="presentation"><span id="cke_16_label" class="cke_combo_label">Size</span><a class="cke_combo_button" title="Font Size" tabindex="-1" href="javascript:void('Font Size')" hidefocus="true" role="button" aria-labelledby="cke_16_label" aria-haspopup="true" onkeydown="return CKEDITOR.tools.callFunction(39,event,this);" onfocus="return CKEDITOR.tools.callFunction(40,event);" onclick="CKEDITOR.tools.callFunction(38,this);return false;"><span id="cke_16_text" class="cke_combo_text cke_combo_inlinelabel">Size</span><span class="cke_combo_open"><span class="cke_combo_arrow"></span></span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_30" class="cke_toolbar" aria-labelledby="cke_30_label" role="toolbar"><span id="cke_30_label" class="cke_voice_label">Colors</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_31" class="cke_button cke_button__textcolor cke_button_off" href="javascript:void('Text Color')" title="Text Color" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_31_label" aria-describedby="cke_31_description" aria-haspopup="true" onkeydown="return CKEDITOR.tools.callFunction(41,event);" onfocus="return CKEDITOR.tools.callFunction(42,event);" onclick="CKEDITOR.tools.callFunction(43,this);return false;"><span class="cke_button_icon cke_button__textcolor_icon" style="background-image:url('https://pos.ultimatefosters.com/AdminLTE/plugins/ckeditor/plugins/icons.png?t=HBDD');background-position:0 -408px;background-size:auto;">&nbsp;</span><span id="cke_31_label" class="cke_button_label cke_button__textcolor_label" aria-hidden="false">Text Color</span><span id="cke_31_description" class="cke_button_label" aria-hidden="false"></span><span class="cke_button_arrow"></span></a><a id="cke_32" class="cke_button cke_button__bgcolor cke_button_off" href="javascript:void('Background Color')" title="Background Color" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_32_label" aria-describedby="cke_32_description" aria-haspopup="true" onkeydown="return CKEDITOR.tools.callFunction(44,event);" onfocus="return CKEDITOR.tools.callFunction(45,event);" onclick="CKEDITOR.tools.callFunction(46,this);return false;"><span class="cke_button_icon cke_button__bgcolor_icon" style="background-image:url('https://pos.ultimatefosters.com/AdminLTE/plugins/ckeditor/plugins/icons.png?t=HBDD');background-position:0 -384px;background-size:auto;">&nbsp;</span><span id="cke_32_label" class="cke_button_label cke_button__bgcolor_label" aria-hidden="false">Background Color</span><span id="cke_32_description" class="cke_button_label" aria-hidden="false"></span><span class="cke_button_arrow"></span></a></span><span class="cke_toolbar_end"></span></span></span></span><div id="cke_1_contents" class="cke_contents cke_reset" role="presentation" style="height: 120px;"><span id="cke_37" class="cke_voice_label">Press ALT 0 for help</span><iframe src="" frameborder="0" class="cke_wysiwyg_frame cke_reset" style="width: 100%; height: 100%;" title="Rich Text Editor, product_description" aria-describedby="cke_37" tabindex="0" allowtransparency="true"></iframe></div><span id="cke_1_bottom" class="cke_bottom cke_reset_all" role="presentation" style="user-select: none;"><span id="cke_1_resizer" class="cke_resizer cke_resizer_vertical cke_resizer_ltr" title="Resize" onmousedown="CKEDITOR.tools.callFunction(0, event)">◢</span><span id="cke_1_path_label" class="cke_voice_label">Elements path</span><span id="cke_1_path" class="cke_path" role="group" aria-labelledby="cke_1_path_label"><span class="cke_path_empty">&nbsp;</span></span></span></div></div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="image">Product image:</label>
            <div class="file-input file-input-new"><div class="file-preview ">
    <div class="close fileinput-remove">×</div>
    <div class="file-drop-disabled">
    <div class="file-preview-thumbnails">
    </div>
    <div class="clearfix"></div>    <div class="file-preview-status text-center text-success"></div>
    <div class="kv-fileinput-error file-error-message" style="display: none;"></div>
    </div>
</div>
<div class="kv-upload-progress hide"><div class="progress">
    <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%;">
        0%
     </div>
</div></div>
<div class="input-group file-caption-main">
   <div tabindex="500" class="form-control file-caption  kv-fileinput-caption">
   <div class="file-caption-name"></div>
</div>

   <div class="input-group-btn">
       <button type="button" tabindex="500" title="Clear selected files" class="btn btn-default fileinput-remove fileinput-remove-button"><i class="glyphicon glyphicon-trash"></i>  <span class="hidden-xs">Remove</span></button>
       <button type="button" tabindex="500" title="Abort ongoing upload" class="btn btn-default hide fileinput-cancel fileinput-cancel-button"><i class="glyphicon glyphicon-ban-circle"></i>  <span class="hidden-xs">Cancel</span></button>
       
       <div tabindex="500" class="btn btn-primary btn-file"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;  <span class="hidden-xs">Browse..</span><input id="upload_image" accept="image/*" name="image" type="file"></div>
   </div>
</div></div>
            <small><p class="help-block">Max File size: 1MB <br> Aspect ratio should be 1:1</p></small>
          </div>
        </div>
        </div>
    </div>
    <!-- /.box-body -->
</div>
    <div class="box box-primary">
                
    <div class="box-body">
        <div class="row">
        
        <div class="col-sm-4">
          <div class="form-group">
            <br>
            <label>
              <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input class="input-icheck" name="enable_sr_no" type="checkbox" value="1" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> <strong>Enable Product description, IMEI or Serial Number</strong>
            </label> <i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" data-container="body" data-toggle="popover" data-placement="auto bottom" data-content="Enable or disable adding product description, IMEI or Serial number while selling products in POS screen" data-html="true" data-trigger="hover"></i>          </div>
        </div>

        <div class="col-sm-4">
          <div class="form-group">
            <br>
            <label>
              <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input class="input-icheck" name="not_for_selling" type="checkbox" value="1" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> <strong>Not for selling</strong>
            </label> <i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" data-container="body" data-toggle="popover" data-placement="auto bottom" data-content="If checked, product will not be displayed in sales screen for selling purposes." data-html="true" data-trigger="hover"></i>          </div>
        </div>

        <div class="clearfix"></div>

        <!-- Rack, Row & position number -->
                
        <div class="col-sm-4">
          <div class="form-group">
            <label for="weight">Weight:</label>
            <input class="form-control" placeholder="Weight" name="weight" type="text" id="weight">
          </div>
        </div>
        <!--custom fields-->
        <div class="clearfix"></div>
        <div class="col-sm-3">
          <div class="form-group">
            <label for="product_custom_field1">Custom Field1:</label>
            <input class="form-control" placeholder="Custom Field1" name="product_custom_field1" type="text" id="product_custom_field1">
          </div>
        </div>

        <div class="col-sm-3">
          <div class="form-group">
            <label for="product_custom_field2">Custom Field2:</label>
            <input class="form-control" placeholder="Custom Field2" name="product_custom_field2" type="text" id="product_custom_field2">
          </div>
        </div>

        <div class="col-sm-3">
          <div class="form-group">
            <label for="product_custom_field3">Custom Field3:</label>
            <input class="form-control" placeholder="Custom Field3" name="product_custom_field3" type="text" id="product_custom_field3">
          </div>
        </div>

        <div class="col-sm-3">
          <div class="form-group">
            <label for="product_custom_field4">Custom Field4:</label>
            <input class="form-control" placeholder="Custom Field4" name="product_custom_field4" type="text" id="product_custom_field4">
          </div>
        </div>
        <!--custom fields-->
        <div class="clearfix"></div>
        <div class="col-md-3">
	<div class="form-group">
		      <br>
        <label>
        	<input type="hidden" name="woocommerce_disable_sync" value="0">
          	<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input class="input-icheck" name="woocommerce_disable_sync" type="checkbox" value="1" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> <strong>Disable Woocommerce Sync</strong>
        </label>
        <i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" data-container="body" data-toggle="popover" data-placement="auto bottom" data-content="If checked this product will not be synced with woocommerce" data-html="true" data-trigger="hover"></i>  	</div>
</div>            </div>
    </div>
    <!-- /.box-body -->
</div>
    <div class="box box-primary">
                
    <div class="box-body">
        <div class="row">

        <div class="col-sm-4 ">
          <div class="form-group">
            <label for="tax">Applicable Tax:</label>
              <select class="form-control select2 select2-hidden-accessible" id="tax" name="tax" tabindex="-1" aria-hidden="true"><option selected="selected" value="">Please Select</option><option value="" selected="selected">None</option><option value="1" data-rate="10">VAT@10%</option><option value="2" data-rate="10">CGST@10%</option><option value="3" data-rate="8">SGST@8%</option><option value="4" data-rate="18">GST@18%</option></select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 498px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-tax-container"><span class="select2-selection__rendered" id="select2-tax-container" title="None">None</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
          </div>
        </div>

        <div class="col-sm-4 ">
          <div class="form-group">
            <label for="tax_type">Selling Price Tax Type:*</label>
              <select class="form-control select2 select2-hidden-accessible" required="" id="tax_type" name="tax_type" tabindex="-1" aria-hidden="true"><option value="inclusive">Inclusive</option><option value="exclusive" selected="selected">Exclusive</option></select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 498px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-tax_type-container"><span class="select2-selection__rendered" id="select2-tax_type-container" title="Exclusive">Exclusive</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
          </div>
        </div>

        <div class="clearfix"></div>

        <div class="col-sm-4">
          <div class="form-group">
            <label for="type">Product Type:*</label> <i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" data-container="body" data-toggle="popover" data-placement="auto bottom" data-content="<b>Single product</b>: Product with no variations.
    <br><b>Variable product</b>: Product with variations such as size, color etc.
    <br><b>Combo product</b>: A combination of multiple products, also called bundle product" data-html="true" data-trigger="hover"></i>            <select class="form-control select2 select2-hidden-accessible" required="" data-action="add" data-product_id="0" id="type" name="type" tabindex="-1" aria-hidden="true"><option value="single">Single</option><option value="variable">Variable</option></select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 498px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-type-container"><span class="select2-selection__rendered" id="select2-type-container" title="Single">Single</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
          </div>
        </div>

        <div class="form-group col-sm-12" id="product_form_part">
          <div class="table-responsive">
    <table class="table table-bordered add-product-price-table table-condensed ">
        <tbody><tr>
          <th>Default Purchase Price</th>
          <th>x Margin(%) <i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" data-container="body" data-toggle="popover" data-placement="auto bottom" data-content="Default profit margin for the product. <br><small class='text-muted'>(<i>You can manage default profit margin in Business Settings.</i>)</small>" data-html="true" data-trigger="hover"></i></th>
          <th>Default Selling Price</th>
                      <th>Product image</th>
                  </tr>
        <tr>
          <td>
            <div class="col-sm-6">
              <label for="single_dpp">Exc. tax:*</label>

              <input class="form-control input-sm dpp input_number" placeholder="Exc. tax" required="" name="single_dpp" type="text" id="single_dpp">
            </div>

            <div class="col-sm-6">
              <label for="single_dpp_inc_tax">Inc. tax:*</label>
            
              <input class="form-control input-sm dpp_inc_tax input_number" placeholder="Inc. tax" required="" name="single_dpp_inc_tax" type="text" id="single_dpp_inc_tax">
            </div>
          </td>

          <td>
            <br>
            <input class="form-control input-sm input_number" id="profit_percent" required="" name="profit_percent" type="text" value="25.00">
          </td>

          <td>
            <label><span class="dsp_label">Exc. Tax</span></label>
            <input class="form-control input-sm dsp input_number" placeholder="Exc. tax" id="single_dsp" required="" name="single_dsp" type="text">

            <input class="form-control input-sm hide input_number" placeholder="Inc. tax" id="single_dsp_inc_tax" required="" name="single_dsp_inc_tax" type="text">
          </td>
                    <td>
              <div class="form-group">
                <label for="variation_images">Product image:</label>
                <input class="variation_images" accept="image/*" multiple="" name="variation_images[]" type="file">
                <small><p class="help-block">Max File size: 1MB <br> Aspect ratio should be 1:1</p></small>
              </div>
          </td>
                  </tr>
    </tbody></table>
</div>        </div>

        <input type="hidden" id="variation_counter" value="1">
        <input type="hidden" id="default_profit_percent" value="25">

      </div>
    </div>
    <!-- /.box-body -->
</div>    <div class="row">
    <div class="col-sm-12">
      <input type="hidden" name="submit_type" id="submit_type">
      <div class="text-center">
      <div class="btn-group">
        
        <button id="opening_stock_button" type="submit" value="submit_n_add_opening_stock" class="btn bg-purple submit_product_form">Save &amp; Add Opening Stock</button>

        <button type="submit" value="save_n_add_another" class="btn bg-maroon submit_product_form">Save And Add Another</button>

        <button type="submit" value="submit" class="btn btn-primary submit_product_form">Save</button>
      </div>
      
      </div>
    </div>
  </div>
</form>
    </section>
    <!-- /.content -->
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import pagination from "@/components/Pagination.vue";
import datatable from "@/components/DataTable.vue";

export default {
  name: "Users",
  components: {
    pagination,
    datatable
  },
  data() {
    return {
      columns: [
        { width: "2%", label: "#", name: "id", active: true },
        { width: "30%", label: "Name", name: "name", active: true },
        {
          width: "30%",
          label: "Description",
          name: "description",
          active: true
        },
        { width: "20%", label: "Status", name: "status", active: true },
        { width: "18%", label: "Action", name: "action", active: false }
      ]
    };
  },
  methods: {
    ...mapActions(["fetchListProducts"])
  },
  created() {
    this.fetchListProducts();
  },
  computed: mapGetters(["getAllProducts", "getMetaData"])
};
</script>

