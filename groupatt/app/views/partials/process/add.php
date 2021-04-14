<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Add New Production Log Book</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="bg-light p-3 animated fadeIn page-content">
                        <form id="process-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("process/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="row">
                                    <div class="form-group col-sm-4">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="date">Date <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <input id="ctrl-date" class="form-control datepicker  datepicker"  required="" value="<?php  echo $this->set_field_value('date',date_now()); ?>" type="datetime" name="date" placeholder="Enter Date" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="d-m-Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="shift">Shift <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <select required=""  id="ctrl-shift" name="shift"  placeholder="Select a value ..."    class="custom-select" >
                                                            <option value="">Select a value ...</option>
                                                            <?php 
                                                            $shift_options = $comp_model -> process_shift_option_list();
                                                            if(!empty($shift_options)){
                                                            foreach($shift_options as $option){
                                                            $value = (!empty($option['value']) ? $option['value'] : null);
                                                            $label = (!empty($option['label']) ? $option['label'] : $value);
                                                            $selected = $this->set_field_selected('shift',$value, "");
                                                            ?>
                                                            <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                                <?php echo $label; ?>
                                                            </option>
                                                            <?php
                                                            }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="grp">Group <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <select required=""  id="ctrl-grp" name="grp"  placeholder="Select a value ..."    class="custom-select" >
                                                            <option value="">Select a value ...</option>
                                                            <?php 
                                                            $grp_options = $comp_model -> process_grp_option_list();
                                                            if(!empty($grp_options)){
                                                            foreach($grp_options as $option){
                                                            $value = (!empty($option['value']) ? $option['value'] : null);
                                                            $label = (!empty($option['label']) ? $option['label'] : $value);
                                                            $selected = $this->set_field_selected('grp',$value, "");
                                                            ?>
                                                            <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                                <?php echo $label; ?>
                                                            </option>
                                                            <?php
                                                            }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-2">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="pink">Pink (Batch) <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <input id="ctrl-pink"  value="<?php  echo $this->set_field_value('pink',""); ?>" type="text" placeholder="Enter Pink (Batch)"  required="" name="pink"  class="form-control " />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="control-label" for="blue">Blue (Batch) <span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="">
                                                            <input id="ctrl-blue"  value="<?php  echo $this->set_field_value('blue',""); ?>" type="text" placeholder="Enter Blue (Batch)"  required="" name="blue"  class="form-control " />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-2">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="domex">Domex (Batch) <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <input id="ctrl-domex"  value="<?php  echo $this->set_field_value('domex',""); ?>" type="text" placeholder="Enter Domex (Batch)"  required="" name="domex"  class="form-control " />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-2">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="easywash">Easywash G1 (Batch) <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="">
                                                                    <input id="ctrl-easywash"  value="<?php  echo $this->set_field_value('easywash',""); ?>" type="text" placeholder="Enter Easywash G1 (Batch)"  required="" name="easywash"  class="form-control " />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-2">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label" for="fg">Fg (Batch) <span class="text-danger">*</span></label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="">
                                                                        <input id="ctrl-fg"  value="<?php  echo $this->set_field_value('fg',""); ?>" type="text" placeholder="Enter Fg (Batch)"  required="" name="fg"  class="form-control " />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-sm-2">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label" for="batch_size">EW Batch Size <span class="text-danger">*</span></label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="">
                                                                            <input id="ctrl-batch_size"  value="<?php  echo $this->set_field_value('batch_size',""); ?>" type="text" placeholder="Enter EW Batch Size"  required="" name="batch_size"  class="form-control " />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-sm-6">
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <label class="control-label" for="manpower">Manpower <span class="text-danger">*</span></label>
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <div class="">
                                                                                <input id="ctrl-manpower"  value="<?php  echo $this->set_field_value('manpower',""); ?>" type="text" placeholder="Enter Manpower"  required="" name="manpower"  class="form-control " />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-sm-6">
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <label class="control-label" for="man_other">Manpower shifted to other location <span class="text-danger">*</span></label>
                                                                            </div>
                                                                            <div class="col-sm-8">
                                                                                <div class="">
                                                                                    <input id="ctrl-man_other"  value="<?php  echo $this->set_field_value('man_other',""); ?>" type="text" placeholder="Enter Manpower shifted to other location"  required="" name="man_other"  class="form-control " />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-sm-2">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <label class="control-label" for="wh60m10">Wh60m10 <span class="text-danger">*</span></label>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <div class="">
                                                                                        <input id="ctrl-wh60m10"  value="<?php  echo $this->set_field_value('wh60m10',""); ?>" type="number" placeholder="Enter Wh60m10" step="1"  required="" name="wh60m10"  class="form-control " />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-sm-2">
                                                                                <div class="row">
                                                                                    <div class="col-sm-4">
                                                                                        <label class="control-label" for="Wh150m2">Wh150m2 <span class="text-danger">*</span></label>
                                                                                    </div>
                                                                                    <div class="col-sm-8">
                                                                                        <div class="">
                                                                                            <input id="ctrl-Wh150m2"  value="<?php  echo $this->set_field_value('Wh150m2',""); ?>" type="number" placeholder="Enter Wh150m2" step="1"  required="" name="Wh150m2"  class="form-control " />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-sm-2">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label class="control-label" for="Wh150m3">Wh150m3 <span class="text-danger">*</span></label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="">
                                                                                                <input id="ctrl-Wh150m3"  value="<?php  echo $this->set_field_value('Wh150m3',""); ?>" type="number" placeholder="Enter Wh150m3" step="1"  required="" name="Wh150m3"  class="form-control " />
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group col-sm-2">
                                                                                        <div class="row">
                                                                                            <div class="col-sm-4">
                                                                                                <label class="control-label" for="Wh150m4">Wh150m4 <span class="text-danger">*</span></label>
                                                                                            </div>
                                                                                            <div class="col-sm-8">
                                                                                                <div class="">
                                                                                                    <input id="ctrl-Wh150m4"  value="<?php  echo $this->set_field_value('Wh150m4',""); ?>" type="number" placeholder="Enter Wh150m4" step="1"  required="" name="Wh150m4"  class="form-control " />
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group col-sm-2">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-4">
                                                                                                    <label class="control-label" for="wh155m2">Wh155m2 <span class="text-danger">*</span></label>
                                                                                                </div>
                                                                                                <div class="col-sm-8">
                                                                                                    <div class="">
                                                                                                        <input id="ctrl-wh155m2"  value="<?php  echo $this->set_field_value('wh155m2',""); ?>" type="number" placeholder="Enter Wh155m2" step="1"  required="" name="wh155m2"  class="form-control " />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group col-sm-2">
                                                                                                <div class="row">
                                                                                                    <div class="col-sm-4">
                                                                                                        <label class="control-label" for="wh155m3">Wh155m3 <span class="text-danger">*</span></label>
                                                                                                    </div>
                                                                                                    <div class="col-sm-8">
                                                                                                        <div class="">
                                                                                                            <input id="ctrl-wh155m3"  value="<?php  echo $this->set_field_value('wh155m3',""); ?>" type="number" placeholder="Enter Wh155m3" step="1"  required="" name="wh155m3"  class="form-control " />
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-2">
                                                                                                    <div class="row">
                                                                                                        <div class="col-sm-4">
                                                                                                            <label class="control-label" for="wh155m4">Wh155m4 <span class="text-danger">*</span></label>
                                                                                                        </div>
                                                                                                        <div class="col-sm-8">
                                                                                                            <div class="">
                                                                                                                <input id="ctrl-wh155m4"  value="<?php  echo $this->set_field_value('wh155m4',""); ?>" type="number" placeholder="Enter Wh155m4" step="1"  required="" name="wh155m4"  class="form-control " />
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-group col-sm-2">
                                                                                                        <div class="row">
                                                                                                            <div class="col-sm-4">
                                                                                                                <label class="control-label" for="wh400m4">Wh400m4 <span class="text-danger">*</span></label>
                                                                                                            </div>
                                                                                                            <div class="col-sm-8">
                                                                                                                <div class="">
                                                                                                                    <input id="ctrl-wh400m4"  value="<?php  echo $this->set_field_value('wh400m4',""); ?>" type="number" placeholder="Enter Wh400m4" step="1"  required="" name="wh400m4"  class="form-control " />
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="form-group col-sm-2">
                                                                                                            <div class="row">
                                                                                                                <div class="col-sm-4">
                                                                                                                    <label class="control-label" for="wh400m7">Wh400m7 <span class="text-danger">*</span></label>
                                                                                                                </div>
                                                                                                                <div class="col-sm-8">
                                                                                                                    <div class="">
                                                                                                                        <input id="ctrl-wh400m7"  value="<?php  echo $this->set_field_value('wh400m7',""); ?>" type="number" placeholder="Enter Wh400m7" step="1"  required="" name="wh400m7"  class="form-control " />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="form-group col-sm-2">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-sm-4">
                                                                                                                        <label class="control-label" for="wh400m8">Wh400m8 <span class="text-danger">*</span></label>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-8">
                                                                                                                        <div class="">
                                                                                                                            <input id="ctrl-wh400m8"  value="<?php  echo $this->set_field_value('wh400m8',""); ?>" type="number" placeholder="Enter Wh400m8" step="1"  required="" name="wh400m8"  class="form-control " />
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-group col-sm-2">
                                                                                                                    <div class="row">
                                                                                                                        <div class="col-sm-4">
                                                                                                                            <label class="control-label" for="wh400m9">Wh400m9 <span class="text-danger">*</span></label>
                                                                                                                        </div>
                                                                                                                        <div class="col-sm-8">
                                                                                                                            <div class="">
                                                                                                                                <input id="ctrl-wh400m9"  value="<?php  echo $this->set_field_value('wh400m9',""); ?>" type="number" placeholder="Enter Wh400m9" step="1"  required="" name="wh400m9"  class="form-control " />
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="form-group col-sm-2">
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-sm-4">
                                                                                                                                <label class="control-label" for="wh1000m7">Wh1000m7 <span class="text-danger">*</span></label>
                                                                                                                            </div>
                                                                                                                            <div class="col-sm-8">
                                                                                                                                <div class="">
                                                                                                                                    <input id="ctrl-wh1000m7"  value="<?php  echo $this->set_field_value('wh1000m7',""); ?>" type="number" placeholder="Enter Wh1000m7" step="1"  required="" name="wh1000m7"  class="form-control " />
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="form-group col-sm-2">
                                                                                                                            <div class="row">
                                                                                                                                <div class="col-sm-4">
                                                                                                                                    <label class="control-label" for="wh1000m8">Wh1000m8 <span class="text-danger">*</span></label>
                                                                                                                                </div>
                                                                                                                                <div class="col-sm-8">
                                                                                                                                    <div class="">
                                                                                                                                        <input id="ctrl-wh1000m8"  value="<?php  echo $this->set_field_value('wh1000m8',""); ?>" type="number" placeholder="Enter Wh1000m8" step="1"  required="" name="wh1000m8"  class="form-control " />
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="form-group col-sm-2">
                                                                                                                                <div class="row">
                                                                                                                                    <div class="col-sm-4">
                                                                                                                                        <label class="control-label" for="wh2000m7">Wh2000m7 <span class="text-danger">*</span></label>
                                                                                                                                    </div>
                                                                                                                                    <div class="col-sm-8">
                                                                                                                                        <div class="">
                                                                                                                                            <input id="ctrl-wh2000m7"  value="<?php  echo $this->set_field_value('wh2000m7',""); ?>" type="number" placeholder="Enter Wh2000m7" step="1"  required="" name="wh2000m7"  class="form-control " />
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="form-group col-sm-2">
                                                                                                                                    <div class="row">
                                                                                                                                        <div class="col-sm-4">
                                                                                                                                            <label class="control-label" for="wh2000m8">Wh2000m8 <span class="text-danger">*</span></label>
                                                                                                                                        </div>
                                                                                                                                        <div class="col-sm-8">
                                                                                                                                            <div class="">
                                                                                                                                                <input id="ctrl-wh2000m8"  value="<?php  echo $this->set_field_value('wh2000m8',""); ?>" type="number" placeholder="Enter Wh2000m8" step="1"  required="" name="wh2000m8"  class="form-control " />
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="form-group col-sm-3">
                                                                                                                                        <div class="row">
                                                                                                                                            <div class="col-sm-4">
                                                                                                                                                <label class="control-label" for="d20m17">D20m17 <span class="text-danger">*</span></label>
                                                                                                                                            </div>
                                                                                                                                            <div class="col-sm-8">
                                                                                                                                                <div class="">
                                                                                                                                                    <input id="ctrl-d20m17"  value="<?php  echo $this->set_field_value('d20m17',""); ?>" type="number" placeholder="Enter D20m17" step="1"  required="" name="d20m17"  class="form-control " />
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                        <div class="form-group col-sm-3">
                                                                                                                                            <div class="row">
                                                                                                                                                <div class="col-sm-4">
                                                                                                                                                    <label class="control-label" for="d100m18">D100m18 <span class="text-danger">*</span></label>
                                                                                                                                                </div>
                                                                                                                                                <div class="col-sm-8">
                                                                                                                                                    <div class="">
                                                                                                                                                        <input id="ctrl-d100m18"  value="<?php  echo $this->set_field_value('d100m18',""); ?>" type="number" placeholder="Enter D100m18" step="1"  required="" name="d100m18"  class="form-control " />
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="form-group col-sm-3">
                                                                                                                                                <div class="row">
                                                                                                                                                    <div class="col-sm-4">
                                                                                                                                                        <label class="control-label" for="d250m16">D250m16 <span class="text-danger">*</span></label>
                                                                                                                                                    </div>
                                                                                                                                                    <div class="col-sm-8">
                                                                                                                                                        <div class="">
                                                                                                                                                            <input id="ctrl-d250m16"  value="<?php  echo $this->set_field_value('d250m16',""); ?>" type="number" placeholder="Enter D250m16" step="1"  required="" name="d250m16"  class="form-control " />
                                                                                                                                                            </div>
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                                <div class="form-group col-sm-3">
                                                                                                                                                    <div class="row">
                                                                                                                                                        <div class="col-sm-4">
                                                                                                                                                            <label class="control-label" for="d400m16">D400m16 <span class="text-danger">*</span></label>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="col-sm-8">
                                                                                                                                                            <div class="">
                                                                                                                                                                <input id="ctrl-d400m16"  value="<?php  echo $this->set_field_value('d400m16',""); ?>" type="number" placeholder="Enter D400m16" step="1"  required="" name="d400m16"  class="form-control " />
                                                                                                                                                                </div>
                                                                                                                                                            </div>
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                    <div class="form-group col-sm-3">
                                                                                                                                                        <div class="row">
                                                                                                                                                            <div class="col-sm-4">
                                                                                                                                                                <label class="control-label" for="ew90m20">Ew90m20 <span class="text-danger">*</span></label>
                                                                                                                                                            </div>
                                                                                                                                                            <div class="col-sm-8">
                                                                                                                                                                <div class="">
                                                                                                                                                                    <input id="ctrl-ew90m20"  value="<?php  echo $this->set_field_value('ew90m20',""); ?>" type="number" placeholder="Enter Ew90m20" step="1"  required="" name="ew90m20"  class="form-control " />
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                            </div>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="form-group col-sm-3">
                                                                                                                                                            <div class="row">
                                                                                                                                                                <div class="col-sm-4">
                                                                                                                                                                    <label class="control-label" for="ew500m25">Ew500m25 <span class="text-danger">*</span></label>
                                                                                                                                                                </div>
                                                                                                                                                                <div class="col-sm-8">
                                                                                                                                                                    <div class="">
                                                                                                                                                                        <input id="ctrl-ew500m25"  value="<?php  echo $this->set_field_value('ew500m25',""); ?>" type="number" placeholder="Enter Ew500m25" step="1"  required="" name="ew500m25"  class="form-control " />
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                            </div>
                                                                                                                                                            <div class="form-group col-sm-3">
                                                                                                                                                                <div class="row">
                                                                                                                                                                    <div class="col-sm-4">
                                                                                                                                                                        <label class="control-label" for="ew500m26">Ew500m26 <span class="text-danger">*</span></label>
                                                                                                                                                                    </div>
                                                                                                                                                                    <div class="col-sm-8">
                                                                                                                                                                        <div class="">
                                                                                                                                                                            <input id="ctrl-ew500m26"  value="<?php  echo $this->set_field_value('ew500m26',""); ?>" type="number" placeholder="Enter Ew500m26" step="1"  required="" name="ew500m26"  class="form-control " />
                                                                                                                                                                            </div>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                                <div class="form-group col-sm-3">
                                                                                                                                                                    <div class="row">
                                                                                                                                                                        <div class="col-sm-4">
                                                                                                                                                                            <label class="control-label" for="ew1000m25">Ew1000m25 <span class="text-danger">*</span></label>
                                                                                                                                                                        </div>
                                                                                                                                                                        <div class="col-sm-8">
                                                                                                                                                                            <div class="">
                                                                                                                                                                                <input id="ctrl-ew1000m25"  value="<?php  echo $this->set_field_value('ew1000m25',""); ?>" type="number" placeholder="Enter Ew1000m25" step="1"  required="" name="ew1000m25"  class="form-control " />
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>
                                                                                                                                                                    <div class="form-group col-sm-3">
                                                                                                                                                                        <div class="row">
                                                                                                                                                                            <div class="col-sm-4">
                                                                                                                                                                                <label class="control-label" for="ew1000m26">Ew1000m26 <span class="text-danger">*</span></label>
                                                                                                                                                                            </div>
                                                                                                                                                                            <div class="col-sm-8">
                                                                                                                                                                                <div class="">
                                                                                                                                                                                    <input id="ctrl-ew1000m26"  value="<?php  echo $this->set_field_value('ew1000m26',""); ?>" type="number" placeholder="Enter Ew1000m26" step="1"  required="" name="ew1000m26"  class="form-control " />
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
                                                                                                                                                                        </div>
                                                                                                                                                                        <div class="form-group col-sm-3">
                                                                                                                                                                            <div class="row">
                                                                                                                                                                                <div class="col-sm-4">
                                                                                                                                                                                    <label class="control-label" for="ew90m21">Ew90m21 <span class="text-danger">*</span></label>
                                                                                                                                                                                </div>
                                                                                                                                                                                <div class="col-sm-8">
                                                                                                                                                                                    <div class="">
                                                                                                                                                                                        <input id="ctrl-ew90m21"  value="<?php  echo $this->set_field_value('ew90m21',""); ?>" type="number" placeholder="Enter Ew90m21" step="1"  required="" name="ew90m21"  class="form-control " />
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
                                                                                                                                                                            <div class="form-group col-sm-3">
                                                                                                                                                                                <div class="row">
                                                                                                                                                                                    <div class="col-sm-4">
                                                                                                                                                                                        <label class="control-label" for="ew90m22">Ew90m22 <span class="text-danger">*</span></label>
                                                                                                                                                                                    </div>
                                                                                                                                                                                    <div class="col-sm-8">
                                                                                                                                                                                        <div class="">
                                                                                                                                                                                            <input id="ctrl-ew90m22"  value="<?php  echo $this->set_field_value('ew90m22',""); ?>" type="number" placeholder="Enter Ew90m22" step="1"  required="" name="ew90m22"  class="form-control " />
                                                                                                                                                                                            </div>
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>
                                                                                                                                                                                <div class="form-group col-sm-3">
                                                                                                                                                                                    <div class="row">
                                                                                                                                                                                        <div class="col-sm-4">
                                                                                                                                                                                            <label class="control-label" for="ew90m23">Ew90m23 <span class="text-danger">*</span></label>
                                                                                                                                                                                        </div>
                                                                                                                                                                                        <div class="col-sm-8">
                                                                                                                                                                                            <div class="">
                                                                                                                                                                                                <input id="ctrl-ew90m23"  value="<?php  echo $this->set_field_value('ew90m23',""); ?>" type="number" placeholder="Enter Ew90m23" step="1"  required="" name="ew90m23"  class="form-control " />
                                                                                                                                                                                                </div>
                                                                                                                                                                                            </div>
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </div>
                                                                                                                                                                                    <div class="form-group col-sm-3">
                                                                                                                                                                                        <div class="row">
                                                                                                                                                                                            <div class="col-sm-4">
                                                                                                                                                                                                <label class="control-label" for="ew90m24">Ew90m24 <span class="text-danger">*</span></label>
                                                                                                                                                                                            </div>
                                                                                                                                                                                            <div class="col-sm-8">
                                                                                                                                                                                                <div class="">
                                                                                                                                                                                                    <input id="ctrl-ew90m24"  value="<?php  echo $this->set_field_value('ew90m24',""); ?>" type="number" placeholder="Enter Ew90m24" step="1"  required="" name="ew90m24"  class="form-control " />
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                </div>
                                                                                                                                                                                            </div>
                                                                                                                                                                                        </div>
                                                                                                                                                                                        <div class="form-group col-sm-3">
                                                                                                                                                                                            <div class="row">
                                                                                                                                                                                                <div class="col-sm-4">
                                                                                                                                                                                                    <label class="control-label" for="ew90m27">Ew90m27 <span class="text-danger">*</span></label>
                                                                                                                                                                                                </div>
                                                                                                                                                                                                <div class="col-sm-8">
                                                                                                                                                                                                    <div class="">
                                                                                                                                                                                                        <input id="ctrl-ew90m27"  value="<?php  echo $this->set_field_value('ew90m27',""); ?>" type="number" placeholder="Enter Ew90m27" step="1"  required="" name="ew90m27"  class="form-control " />
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                </div>
                                                                                                                                                                                            </div>
                                                                                                                                                                                            <div class="form-group col-sm-3">
                                                                                                                                                                                                <div class="row">
                                                                                                                                                                                                    <div class="col-sm-4">
                                                                                                                                                                                                        <label class="control-label" for="ew100m20">Ew100m20 <span class="text-danger">*</span></label>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                    <div class="col-sm-8">
                                                                                                                                                                                                        <div class="">
                                                                                                                                                                                                            <input id="ctrl-ew100m20"  value="<?php  echo $this->set_field_value('ew100m20',""); ?>" type="number" placeholder="Enter Ew100m20" step="1"  required="" name="ew100m20"  class="form-control " />
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                </div>
                                                                                                                                                                                                <div class="form-group col-sm-3">
                                                                                                                                                                                                    <div class="row">
                                                                                                                                                                                                        <div class="col-sm-4">
                                                                                                                                                                                                            <label class="control-label" for="ew100m21">Ew100m21 <span class="text-danger">*</span></label>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        <div class="col-sm-8">
                                                                                                                                                                                                            <div class="">
                                                                                                                                                                                                                <input id="ctrl-ew100m21"  value="<?php  echo $this->set_field_value('ew100m21',""); ?>" type="number" placeholder="Enter Ew100m21" step="1"  required="" name="ew100m21"  class="form-control " />
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                    <div class="form-group col-sm-3">
                                                                                                                                                                                                        <div class="row">
                                                                                                                                                                                                            <div class="col-sm-4">
                                                                                                                                                                                                                <label class="control-label" for="ew100m22">Ew100m22 <span class="text-danger">*</span></label>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                            <div class="col-sm-8">
                                                                                                                                                                                                                <div class="">
                                                                                                                                                                                                                    <input id="ctrl-ew100m22"  value="<?php  echo $this->set_field_value('ew100m22',""); ?>" type="number" placeholder="Enter Ew100m22" step="1"  required="" name="ew100m22"  class="form-control " />
                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        <div class="form-group col-sm-3">
                                                                                                                                                                                                            <div class="row">
                                                                                                                                                                                                                <div class="col-sm-4">
                                                                                                                                                                                                                    <label class="control-label" for="ew100m23">Ew100m23 <span class="text-danger">*</span></label>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                <div class="col-sm-8">
                                                                                                                                                                                                                    <div class="">
                                                                                                                                                                                                                        <input id="ctrl-ew100m23"  value="<?php  echo $this->set_field_value('ew100m23',""); ?>" type="number" placeholder="Enter Ew100m23" step="1"  required="" name="ew100m23"  class="form-control " />
                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                            <div class="form-group col-sm-3">
                                                                                                                                                                                                                <div class="row">
                                                                                                                                                                                                                    <div class="col-sm-4">
                                                                                                                                                                                                                        <label class="control-label" for="ew100m24">Ew100m24 <span class="text-danger">*</span></label>
                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                    <div class="col-sm-8">
                                                                                                                                                                                                                        <div class="">
                                                                                                                                                                                                                            <input id="ctrl-ew100m24"  value="<?php  echo $this->set_field_value('ew100m24',""); ?>" type="number" placeholder="Enter Ew100m24" step="1"  required="" name="ew100m24"  class="form-control " />
                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                <div class="form-group col-sm-3">
                                                                                                                                                                                                                    <div class="row">
                                                                                                                                                                                                                        <div class="col-sm-4">
                                                                                                                                                                                                                            <label class="control-label" for="ew100m27">Ew100m27 <span class="text-danger">*</span></label>
                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                        <div class="col-sm-8">
                                                                                                                                                                                                                            <div class="">
                                                                                                                                                                                                                                <input id="ctrl-ew100m27"  value="<?php  echo $this->set_field_value('ew100m27',""); ?>" type="number" placeholder="Enter Ew100m27" step="1"  required="" name="ew100m27"  class="form-control " />
                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                <div class="form-group form-submit-btn-holder text-center mt-3">
                                                                                                                                                                                                                    <div class="form-ajax-status"></div>
                                                                                                                                                                                                                    <button class="btn btn-primary" type="submit">
                                                                                                                                                                                                                        Submit
                                                                                                                                                                                                                        <i class="fa fa-send"></i>
                                                                                                                                                                                                                    </button>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                            </form>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                </div>
                                                                                                                                                                                            </div>
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </section>
