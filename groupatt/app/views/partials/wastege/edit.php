<?php
$comp_model = new SharedController;
$page_element_id = "edit-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="edit"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Edit  Wastege</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-7 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="bg-light p-3 animated fadeIn page-content">
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-horizontal needs-validation" action="<?php print_link("wastege/edit/$page_id/?csrf_token=$csrf_token"); ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="date">Date <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input id="ctrl-date" class="form-control datepicker  datepicker"  required="" value="<?php  echo $data['date']; ?>" type="datetime" name="date" placeholder="Enter Date" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="d-m-Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="shift">Shift <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input id="ctrl-shift"  value="<?php  echo $data['shift']; ?>" type="text" placeholder="Enter Shift"  required="" name="shift"  class="form-control " />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="pink">Pink <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <input id="ctrl-pink"  value="<?php  echo $data['pink']; ?>" type="text" placeholder="Enter Pink"  required="" name="pink"  class="form-control " />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="control-label" for="blue">Blue <span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="">
                                                            <input id="ctrl-blue"  value="<?php  echo $data['blue']; ?>" type="text" placeholder="Enter Blue"  required="" name="blue"  class="form-control " />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="domex">Domex <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <input id="ctrl-domex"  value="<?php  echo $data['domex']; ?>" type="text" placeholder="Enter Domex"  required="" name="domex"  class="form-control " />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="easywash">Easywash <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="">
                                                                    <input id="ctrl-easywash"  value="<?php  echo $data['easywash']; ?>" type="text" placeholder="Enter Easywash"  required="" name="easywash"  class="form-control " />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label" for="grp">Grp <span class="text-danger">*</span></label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="">
                                                                        <select required=""  id="ctrl-grp" name="grp"  placeholder="Select a value ..."    class="custom-select" >
                                                                            <option value="">Select a value ...</option>
                                                                            <?php
                                                                            $rec = $data['grp'];
                                                                            $grp_options = $comp_model -> wastege_grp_option_list();
                                                                            if(!empty($grp_options)){
                                                                            foreach($grp_options as $option){
                                                                            $value = (!empty($option['value']) ? $option['value'] : null);
                                                                            $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                            $selected = ( $value == $rec ? 'selected' : null );
                                                                            ?>
                                                                            <option 
                                                                                <?php echo $selected; ?> value="<?php echo $value; ?>"><?php echo $label; ?>
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
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label" for="manpower">Manpower <span class="text-danger">*</span></label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="">
                                                                        <input id="ctrl-manpower"  value="<?php  echo $data['manpower']; ?>" type="text" placeholder="Enter Manpower"  required="" name="manpower"  class="form-control " />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label" for="wh60m10">Wh60m10 <span class="text-danger">*</span></label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="">
                                                                            <input id="ctrl-wh60m10"  value="<?php  echo $data['wh60m10']; ?>" type="number" placeholder="Enter Wh60m10" step="1"  required="" name="wh60m10"  class="form-control " />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <label class="control-label" for="wh155m2">Wh155m2 <span class="text-danger">*</span></label>
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <div class="">
                                                                                <input id="ctrl-wh155m2"  value="<?php  echo $data['wh155m2']; ?>" type="number" placeholder="Enter Wh155m2" step="1"  required="" name="wh155m2"  class="form-control " />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <label class="control-label" for="wh400m4">Wh400m4 <span class="text-danger">*</span></label>
                                                                            </div>
                                                                            <div class="col-sm-8">
                                                                                <div class="">
                                                                                    <input id="ctrl-wh400m4"  value="<?php  echo $data['wh400m4']; ?>" type="number" placeholder="Enter Wh400m4" step="1"  required="" name="wh400m4"  class="form-control " />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group ">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <label class="control-label" for="wh1000m7">Wh1000m7 <span class="text-danger">*</span></label>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <div class="">
                                                                                        <input id="ctrl-wh1000m7"  value="<?php  echo $data['wh1000m7']; ?>" type="number" placeholder="Enter Wh1000m7" step="1"  required="" name="wh1000m7"  class="form-control " />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group ">
                                                                                <div class="row">
                                                                                    <div class="col-sm-4">
                                                                                        <label class="control-label" for="wh2000m7">Wh2000m7 <span class="text-danger">*</span></label>
                                                                                    </div>
                                                                                    <div class="col-sm-8">
                                                                                        <div class="">
                                                                                            <input id="ctrl-wh2000m7"  value="<?php  echo $data['wh2000m7']; ?>" type="number" placeholder="Enter Wh2000m7" step="1"  required="" name="wh2000m7"  class="form-control " />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group ">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label class="control-label" for="d20m17">D20m17 <span class="text-danger">*</span></label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="">
                                                                                                <input id="ctrl-d20m17"  value="<?php  echo $data['d20m17']; ?>" type="number" placeholder="Enter D20m17" step="1"  required="" name="d20m17"  class="form-control " />
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group ">
                                                                                        <div class="row">
                                                                                            <div class="col-sm-4">
                                                                                                <label class="control-label" for="d100m18">D100m18 <span class="text-danger">*</span></label>
                                                                                            </div>
                                                                                            <div class="col-sm-8">
                                                                                                <div class="">
                                                                                                    <input id="ctrl-d100m18"  value="<?php  echo $data['d100m18']; ?>" type="number" placeholder="Enter D100m18" step="1"  required="" name="d100m18"  class="form-control " />
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group ">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-4">
                                                                                                    <label class="control-label" for="d250m16">D250m16 <span class="text-danger">*</span></label>
                                                                                                </div>
                                                                                                <div class="col-sm-8">
                                                                                                    <div class="">
                                                                                                        <input id="ctrl-d250m16"  value="<?php  echo $data['d250m16']; ?>" type="number" placeholder="Enter D250m16" step="1"  required="" name="d250m16"  class="form-control " />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group ">
                                                                                                <div class="row">
                                                                                                    <div class="col-sm-4">
                                                                                                        <label class="control-label" for="d400m16">D400m16 <span class="text-danger">*</span></label>
                                                                                                    </div>
                                                                                                    <div class="col-sm-8">
                                                                                                        <div class="">
                                                                                                            <input id="ctrl-d400m16"  value="<?php  echo $data['d400m16']; ?>" type="number" placeholder="Enter D400m16" step="1"  required="" name="d400m16"  class="form-control " />
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group ">
                                                                                                    <div class="row">
                                                                                                        <div class="col-sm-4">
                                                                                                            <label class="control-label" for="ew90m20">Ew90m20 <span class="text-danger">*</span></label>
                                                                                                        </div>
                                                                                                        <div class="col-sm-8">
                                                                                                            <div class="">
                                                                                                                <input id="ctrl-ew90m20"  value="<?php  echo $data['ew90m20']; ?>" type="number" placeholder="Enter Ew90m20" step="1"  required="" name="ew90m20"  class="form-control " />
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-group ">
                                                                                                        <div class="row">
                                                                                                            <div class="col-sm-4">
                                                                                                                <label class="control-label" for="ew500m25">Ew500m25 <span class="text-danger">*</span></label>
                                                                                                            </div>
                                                                                                            <div class="col-sm-8">
                                                                                                                <div class="">
                                                                                                                    <input id="ctrl-ew500m25"  value="<?php  echo $data['ew500m25']; ?>" type="number" placeholder="Enter Ew500m25" step="1"  required="" name="ew500m25"  class="form-control " />
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="form-group ">
                                                                                                            <div class="row">
                                                                                                                <div class="col-sm-4">
                                                                                                                    <label class="control-label" for="ew1000m25">Ew1000m25 <span class="text-danger">*</span></label>
                                                                                                                </div>
                                                                                                                <div class="col-sm-8">
                                                                                                                    <div class="">
                                                                                                                        <input id="ctrl-ew1000m25"  value="<?php  echo $data['ew1000m25']; ?>" type="number" placeholder="Enter Ew1000m25" step="1"  required="" name="ew1000m25"  class="form-control " />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="form-group ">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-sm-4">
                                                                                                                        <label class="control-label" for="ew100m20">Ew100m20 <span class="text-danger">*</span></label>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-8">
                                                                                                                        <div class="">
                                                                                                                            <input id="ctrl-ew100m20"  value="<?php  echo $data['ew100m20']; ?>" type="number" placeholder="Enter Ew100m20" step="1"  required="" name="ew100m20"  class="form-control " />
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-group ">
                                                                                                                    <div class="row">
                                                                                                                        <div class="col-sm-4">
                                                                                                                            <label class="control-label" for="wh155m3">Wh155m3 <span class="text-danger">*</span></label>
                                                                                                                        </div>
                                                                                                                        <div class="col-sm-8">
                                                                                                                            <div class="">
                                                                                                                                <input id="ctrl-wh155m3"  value="<?php  echo $data['wh155m3']; ?>" type="number" placeholder="Enter Wh155m3" step="1"  required="" name="wh155m3"  class="form-control " />
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="form-group ">
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-sm-4">
                                                                                                                                <label class="control-label" for="wh155m4">Wh155m4 <span class="text-danger">*</span></label>
                                                                                                                            </div>
                                                                                                                            <div class="col-sm-8">
                                                                                                                                <div class="">
                                                                                                                                    <input id="ctrl-wh155m4"  value="<?php  echo $data['wh155m4']; ?>" type="number" placeholder="Enter Wh155m4" step="1"  required="" name="wh155m4"  class="form-control " />
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="form-group ">
                                                                                                                            <div class="row">
                                                                                                                                <div class="col-sm-4">
                                                                                                                                    <label class="control-label" for="wh400m7">Wh400m7 <span class="text-danger">*</span></label>
                                                                                                                                </div>
                                                                                                                                <div class="col-sm-8">
                                                                                                                                    <div class="">
                                                                                                                                        <input id="ctrl-wh400m7"  value="<?php  echo $data['wh400m7']; ?>" type="number" placeholder="Enter Wh400m7" step="1"  required="" name="wh400m7"  class="form-control " />
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="form-group ">
                                                                                                                                <div class="row">
                                                                                                                                    <div class="col-sm-4">
                                                                                                                                        <label class="control-label" for="wh400m8">Wh400m8 <span class="text-danger">*</span></label>
                                                                                                                                    </div>
                                                                                                                                    <div class="col-sm-8">
                                                                                                                                        <div class="">
                                                                                                                                            <input id="ctrl-wh400m8"  value="<?php  echo $data['wh400m8']; ?>" type="number" placeholder="Enter Wh400m8" step="1"  required="" name="wh400m8"  class="form-control " />
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="form-group ">
                                                                                                                                    <div class="row">
                                                                                                                                        <div class="col-sm-4">
                                                                                                                                            <label class="control-label" for="wh400m9">Wh400m9 <span class="text-danger">*</span></label>
                                                                                                                                        </div>
                                                                                                                                        <div class="col-sm-8">
                                                                                                                                            <div class="">
                                                                                                                                                <input id="ctrl-wh400m9"  value="<?php  echo $data['wh400m9']; ?>" type="number" placeholder="Enter Wh400m9" step="1"  required="" name="wh400m9"  class="form-control " />
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="form-group ">
                                                                                                                                        <div class="row">
                                                                                                                                            <div class="col-sm-4">
                                                                                                                                                <label class="control-label" for="wh1000m8">Wh1000m8 <span class="text-danger">*</span></label>
                                                                                                                                            </div>
                                                                                                                                            <div class="col-sm-8">
                                                                                                                                                <div class="">
                                                                                                                                                    <input id="ctrl-wh1000m8"  value="<?php  echo $data['wh1000m8']; ?>" type="number" placeholder="Enter Wh1000m8" step="1"  required="" name="wh1000m8"  class="form-control " />
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                        <div class="form-group ">
                                                                                                                                            <div class="row">
                                                                                                                                                <div class="col-sm-4">
                                                                                                                                                    <label class="control-label" for="wh2000m8">Wh2000m8 <span class="text-danger">*</span></label>
                                                                                                                                                </div>
                                                                                                                                                <div class="col-sm-8">
                                                                                                                                                    <div class="">
                                                                                                                                                        <input id="ctrl-wh2000m8"  value="<?php  echo $data['wh2000m8']; ?>" type="number" placeholder="Enter Wh2000m8" step="1"  required="" name="wh2000m8"  class="form-control " />
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="form-group ">
                                                                                                                                                <div class="row">
                                                                                                                                                    <div class="col-sm-4">
                                                                                                                                                        <label class="control-label" for="ew90m21">Ew90m21 <span class="text-danger">*</span></label>
                                                                                                                                                    </div>
                                                                                                                                                    <div class="col-sm-8">
                                                                                                                                                        <div class="">
                                                                                                                                                            <input id="ctrl-ew90m21"  value="<?php  echo $data['ew90m21']; ?>" type="number" placeholder="Enter Ew90m21" step="1"  required="" name="ew90m21"  class="form-control " />
                                                                                                                                                            </div>
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                                <div class="form-group ">
                                                                                                                                                    <div class="row">
                                                                                                                                                        <div class="col-sm-4">
                                                                                                                                                            <label class="control-label" for="ew90m22">Ew90m22 <span class="text-danger">*</span></label>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="col-sm-8">
                                                                                                                                                            <div class="">
                                                                                                                                                                <input id="ctrl-ew90m22"  value="<?php  echo $data['ew90m22']; ?>" type="number" placeholder="Enter Ew90m22" step="1"  required="" name="ew90m22"  class="form-control " />
                                                                                                                                                                </div>
                                                                                                                                                            </div>
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                    <div class="form-group ">
                                                                                                                                                        <div class="row">
                                                                                                                                                            <div class="col-sm-4">
                                                                                                                                                                <label class="control-label" for="ew90m23">Ew90m23 <span class="text-danger">*</span></label>
                                                                                                                                                            </div>
                                                                                                                                                            <div class="col-sm-8">
                                                                                                                                                                <div class="">
                                                                                                                                                                    <input id="ctrl-ew90m23"  value="<?php  echo $data['ew90m23']; ?>" type="number" placeholder="Enter Ew90m23" step="1"  required="" name="ew90m23"  class="form-control " />
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                            </div>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="form-group ">
                                                                                                                                                            <div class="row">
                                                                                                                                                                <div class="col-sm-4">
                                                                                                                                                                    <label class="control-label" for="ew90m24">Ew90m24 <span class="text-danger">*</span></label>
                                                                                                                                                                </div>
                                                                                                                                                                <div class="col-sm-8">
                                                                                                                                                                    <div class="">
                                                                                                                                                                        <input id="ctrl-ew90m24"  value="<?php  echo $data['ew90m24']; ?>" type="number" placeholder="Enter Ew90m24" step="1"  required="" name="ew90m24"  class="form-control " />
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                            </div>
                                                                                                                                                            <div class="form-group ">
                                                                                                                                                                <div class="row">
                                                                                                                                                                    <div class="col-sm-4">
                                                                                                                                                                        <label class="control-label" for="ew90m27">Ew90m27 <span class="text-danger">*</span></label>
                                                                                                                                                                    </div>
                                                                                                                                                                    <div class="col-sm-8">
                                                                                                                                                                        <div class="">
                                                                                                                                                                            <input id="ctrl-ew90m27"  value="<?php  echo $data['ew90m27']; ?>" type="number" placeholder="Enter Ew90m27" step="1"  required="" name="ew90m27"  class="form-control " />
                                                                                                                                                                            </div>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                                <div class="form-group ">
                                                                                                                                                                    <div class="row">
                                                                                                                                                                        <div class="col-sm-4">
                                                                                                                                                                            <label class="control-label" for="ew100m21">Ew100m21 <span class="text-danger">*</span></label>
                                                                                                                                                                        </div>
                                                                                                                                                                        <div class="col-sm-8">
                                                                                                                                                                            <div class="">
                                                                                                                                                                                <input id="ctrl-ew100m21"  value="<?php  echo $data['ew100m21']; ?>" type="number" placeholder="Enter Ew100m21" step="1"  required="" name="ew100m21"  class="form-control " />
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>
                                                                                                                                                                    <div class="form-group ">
                                                                                                                                                                        <div class="row">
                                                                                                                                                                            <div class="col-sm-4">
                                                                                                                                                                                <label class="control-label" for="ew100m22">Ew100m22 <span class="text-danger">*</span></label>
                                                                                                                                                                            </div>
                                                                                                                                                                            <div class="col-sm-8">
                                                                                                                                                                                <div class="">
                                                                                                                                                                                    <input id="ctrl-ew100m22"  value="<?php  echo $data['ew100m22']; ?>" type="number" placeholder="Enter Ew100m22" step="1"  required="" name="ew100m22"  class="form-control " />
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
                                                                                                                                                                        </div>
                                                                                                                                                                        <div class="form-group ">
                                                                                                                                                                            <div class="row">
                                                                                                                                                                                <div class="col-sm-4">
                                                                                                                                                                                    <label class="control-label" for="ew100m23">Ew100m23 <span class="text-danger">*</span></label>
                                                                                                                                                                                </div>
                                                                                                                                                                                <div class="col-sm-8">
                                                                                                                                                                                    <div class="">
                                                                                                                                                                                        <input id="ctrl-ew100m23"  value="<?php  echo $data['ew100m23']; ?>" type="number" placeholder="Enter Ew100m23" step="1"  required="" name="ew100m23"  class="form-control " />
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
                                                                                                                                                                            <div class="form-group ">
                                                                                                                                                                                <div class="row">
                                                                                                                                                                                    <div class="col-sm-4">
                                                                                                                                                                                        <label class="control-label" for="ew100m24">Ew100m24 <span class="text-danger">*</span></label>
                                                                                                                                                                                    </div>
                                                                                                                                                                                    <div class="col-sm-8">
                                                                                                                                                                                        <div class="">
                                                                                                                                                                                            <input id="ctrl-ew100m24"  value="<?php  echo $data['ew100m24']; ?>" type="number" placeholder="Enter Ew100m24" step="1"  required="" name="ew100m24"  class="form-control " />
                                                                                                                                                                                            </div>
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>
                                                                                                                                                                                <div class="form-group ">
                                                                                                                                                                                    <div class="row">
                                                                                                                                                                                        <div class="col-sm-4">
                                                                                                                                                                                            <label class="control-label" for="ew100m27">Ew100m27 <span class="text-danger">*</span></label>
                                                                                                                                                                                        </div>
                                                                                                                                                                                        <div class="col-sm-8">
                                                                                                                                                                                            <div class="">
                                                                                                                                                                                                <input id="ctrl-ew100m27"  value="<?php  echo $data['ew100m27']; ?>" type="number" placeholder="Enter Ew100m27" step="1"  required="" name="ew100m27"  class="form-control " />
                                                                                                                                                                                                </div>
                                                                                                                                                                                            </div>
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </div>
                                                                                                                                                                                    <div class="form-group ">
                                                                                                                                                                                        <div class="row">
                                                                                                                                                                                            <div class="col-sm-4">
                                                                                                                                                                                                <label class="control-label" for="ew500m26">Ew500m26 <span class="text-danger">*</span></label>
                                                                                                                                                                                            </div>
                                                                                                                                                                                            <div class="col-sm-8">
                                                                                                                                                                                                <div class="">
                                                                                                                                                                                                    <input id="ctrl-ew500m26"  value="<?php  echo $data['ew500m26']; ?>" type="number" placeholder="Enter Ew500m26" step="1"  required="" name="ew500m26"  class="form-control " />
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                </div>
                                                                                                                                                                                            </div>
                                                                                                                                                                                        </div>
                                                                                                                                                                                        <div class="form-group ">
                                                                                                                                                                                            <div class="row">
                                                                                                                                                                                                <div class="col-sm-4">
                                                                                                                                                                                                    <label class="control-label" for="ew1000m26">Ew1000m26 <span class="text-danger">*</span></label>
                                                                                                                                                                                                </div>
                                                                                                                                                                                                <div class="col-sm-8">
                                                                                                                                                                                                    <div class="">
                                                                                                                                                                                                        <input id="ctrl-ew1000m26"  value="<?php  echo $data['ew1000m26']; ?>" type="number" placeholder="Enter Ew1000m26" step="1"  required="" name="ew1000m26"  class="form-control " />
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                </div>
                                                                                                                                                                                            </div>
                                                                                                                                                                                        </div>
                                                                                                                                                                                        <div class="form-ajax-status"></div>
                                                                                                                                                                                        <div class="form-group text-center">
                                                                                                                                                                                            <button class="btn btn-primary" type="submit">
                                                                                                                                                                                                Update
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
