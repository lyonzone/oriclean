<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("emp/add");
$can_edit = ACL::is_allowed("emp/edit");
$can_view = ACL::is_allowed("emp/view");
$can_delete = ACL::is_allowed("emp/delete");
?>
<?php
$comp_model = new SharedController;
$page_element_id = "view-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data Information from Controller
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id; //Page id from url
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">View  Emp</h4>
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
                <div class="col-md-12 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="card animated fadeIn page-content">
                        <?php
                        $counter = 0;
                        if(!empty($data)){
                        $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-id">
                                        <th class="title"> Id: </th>
                                        <td class="value"> <?php echo $data['id']; ?></td>
                                    </tr>
                                    <tr  class="td-date">
                                        <th class="title"> Date: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{altFormat: 'd-m-Y H:i:s', minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['date']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="date" 
                                                data-title="Enter Date" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['date']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-gr">
                                        <th class="title"> Gr: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_gr_option_list'); ?>' 
                                                data-value="<?php echo $data['gr']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="gr" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['gr']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-shift_inch1">
                                        <th class="title"> Shift Inch1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_shift_inch1_option_list'); ?>' 
                                                data-value="<?php echo $data['shift_inch1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="shift_inch1" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['shift_inch1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-shift_inch2">
                                        <th class="title"> Shift Inch2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_shift_inch2_option_list'); ?>' 
                                                data-value="<?php echo $data['shift_inch2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="shift_inch2" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['shift_inch2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-gr_leader">
                                        <th class="title"> Gr Leader: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_gr_leader_option_list'); ?>' 
                                                data-value="<?php echo $data['gr_leader']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="gr_leader" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['gr_leader']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-shift">
                                        <th class="title"> Shift: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_shift_option_list'); ?>' 
                                                data-value="<?php echo $data['shift']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="shift" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['shift']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ghk">
                                        <th class="title"> Ghk: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ghk_option_list'); ?>' 
                                                data-value="<?php echo $data['ghk']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ghk" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ghk']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-online_checker1">
                                        <th class="title"> Online Checker1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_online_checker1_option_list'); ?>' 
                                                data-value="<?php echo $data['online_checker1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="online_checker1" 
                                                data-title="Enter Online Checker" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['online_checker1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-online_checker2">
                                        <th class="title"> Online Checker2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_online_checker2_option_list'); ?>' 
                                                data-value="<?php echo $data['online_checker2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="online_checker2" 
                                                data-title="Enter Online Checker" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['online_checker2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-online_checker3">
                                        <th class="title"> Online Checker3: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_online_checker3_option_list'); ?>' 
                                                data-value="<?php echo $data['online_checker3']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="online_checker3" 
                                                data-title="Enter Online Checker" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['online_checker3']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-fitter">
                                        <th class="title"> Fitter: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_fitter_option_list'); ?>' 
                                                data-value="<?php echo $data['fitter']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="fitter" 
                                                data-title="Enter Fitter" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['fitter']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-dmx_feeding">
                                        <th class="title"> Dmx Feeding: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_dmx_feeding_option_list'); ?>' 
                                                data-value="<?php echo $data['dmx_feeding']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="dmx_feeding" 
                                                data-title="Enter Domex Feeding" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['dmx_feeding']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-dmx_bagger">
                                        <th class="title"> Dmx Bagger: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_dmx_bagger_option_list'); ?>' 
                                                data-value="<?php echo $data['dmx_bagger']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="dmx_bagger" 
                                                data-title="Enter Domex Bagger" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['dmx_bagger']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-dmx_hasia">
                                        <th class="title"> Dmx Hasia: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_dmx_hasia_option_list'); ?>' 
                                                data-value="<?php echo $data['dmx_hasia']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="dmx_hasia" 
                                                data-title="Enter Domex Hasia" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['dmx_hasia']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-dmx_subham">
                                        <th class="title"> Dmx Subham: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_dmx_subham_option_list'); ?>' 
                                                data-value="<?php echo $data['dmx_subham']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="dmx_subham" 
                                                data-title="Enter Domex Subham" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['dmx_subham']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-dmx_sigma">
                                        <th class="title"> Dmx Sigma: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_dmx_sigma_option_list'); ?>' 
                                                data-value="<?php echo $data['dmx_sigma']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="dmx_sigma" 
                                                data-title="Enter Domex Sigma" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['dmx_sigma']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_boone">
                                        <th class="title"> Ew Boone: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_boone_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_boone']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_boone" 
                                                data-title="Enter EW BOONE MIXER OPERATOR" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_boone']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_bosch">
                                        <th class="title"> Ew Bosch: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_bosch_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_bosch']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_bosch" 
                                                data-title="Enter EW BOSCH OPERATOR (B-25+26)" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_bosch']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_feeding">
                                        <th class="title"> Ew Feeding: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_feeding_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_feeding']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_feeding" 
                                                data-title="Enter EW Feeding" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_feeding']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_subham">
                                        <th class="title"> Ew Subham: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_subham_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_subham']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_subham" 
                                                data-title="Enter EW SUBHAM P/C M/C  OPERATOR" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_subham']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_bagger">
                                        <th class="title"> Ew Bagger: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_bagger_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_bagger']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_bagger" 
                                                data-title="Enter EW Bagger" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_bagger']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-shift_elect1">
                                        <th class="title"> Shift Elect1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_shift_elect1_option_list'); ?>' 
                                                data-value="<?php echo $data['shift_elect1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="shift_elect1" 
                                                data-title="Enter Shift Electrician" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['shift_elect1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-qc1">
                                        <th class="title"> Qc1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_qc1_option_list'); ?>' 
                                                data-value="<?php echo $data['qc1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="qc1" 
                                                data-title="Enter QC" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['qc1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-qc2">
                                        <th class="title"> Qc2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_qc2_option_list'); ?>' 
                                                data-value="<?php echo $data['qc2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="qc2" 
                                                data-title="Enter QC" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['qc2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-shift_elect2">
                                        <th class="title"> Shift Elect2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_shift_elect2_option_list'); ?>' 
                                                data-value="<?php echo $data['shift_elect2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="shift_elect2" 
                                                data-title="Enter Shift Electrician" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['shift_elect2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-minor1">
                                        <th class="title"> Minor1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_minor1_option_list'); ?>' 
                                                data-value="<?php echo $data['minor1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="minor1" 
                                                data-title="Enter MINORS WEIGHING & OTHER RM LOADER" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['minor1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-minor2">
                                        <th class="title"> Minor2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_minor2_option_list'); ?>' 
                                                data-value="<?php echo $data['minor2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="minor2" 
                                                data-title="Enter MINORS WEIGHING & OTHER RM LOADER" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['minor2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-minor3">
                                        <th class="title"> Minor3: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_minor3_option_list'); ?>' 
                                                data-value="<?php echo $data['minor3']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="minor3" 
                                                data-title="Enter MINORS WEIGHING & OTHER RM LOADER" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['minor3']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-minor5">
                                        <th class="title"> Minor5: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_minor5_option_list'); ?>' 
                                                data-value="<?php echo $data['minor5']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="minor5" 
                                                data-title="Enter MINORS WEIGHING & OTHER RM LOADER" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['minor5']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-minor6">
                                        <th class="title"> Minor6: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_minor6_option_list'); ?>' 
                                                data-value="<?php echo $data['minor6']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="minor6" 
                                                data-title="Enter MINORS WEIGHING & OTHER RM LOADER" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['minor6']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-minor7">
                                        <th class="title"> Minor7: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_minor7_option_list'); ?>' 
                                                data-value="<?php echo $data['minor7']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="minor7" 
                                                data-title="Enter MINORS WEIGHING & OTHER RM LOADER" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['minor7']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-minor8">
                                        <th class="title"> Minor8: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_minor8_option_list'); ?>' 
                                                data-value="<?php echo $data['minor8']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="minor8" 
                                                data-title="Enter MINORS WEIGHING & OTHER RM LOADER" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['minor8']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-forklift1">
                                        <th class="title"> Forklift1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_forklift1_option_list'); ?>' 
                                                data-value="<?php echo $data['forklift1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="forklift1" 
                                                data-title="Enter Fork Lift Operator" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['forklift1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-forklift2">
                                        <th class="title"> Forklift2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_forklift2_option_list'); ?>' 
                                                data-value="<?php echo $data['forklift2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="forklift2" 
                                                data-title="Enter Fork Lift Operator" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['forklift2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-forklift3">
                                        <th class="title"> Forklift3: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_forklift3_option_list'); ?>' 
                                                data-value="<?php echo $data['forklift3']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="forklift3" 
                                                data-title="Enter Fork Lift Operator" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['forklift3']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_feeding1">
                                        <th class="title"> Wl Feeding1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_feeding1_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_feeding1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_feeding1" 
                                                data-title="Enter WHEEL FEEDING" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_feeding1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_feeding2">
                                        <th class="title"> Wl Feeding2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_feeding2_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_feeding2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_feeding2" 
                                                data-title="Enter WHEEL FEEDING" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_feeding2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_feeding3">
                                        <th class="title"> Wl Feeding3: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_feeding3_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_feeding3']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_feeding3" 
                                                data-title="Enter WHEEL FEEDING" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_feeding3']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_feeding4">
                                        <th class="title"> Wl Feeding4: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_feeding4_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_feeding4']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_feeding4" 
                                                data-title="Enter WHEEL FEEDING" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_feeding4']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_feeding5">
                                        <th class="title"> Wl Feeding5: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_feeding5_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_feeding5']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_feeding5" 
                                                data-title="Enter WHEEL FEEDING" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_feeding5']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_feeding6">
                                        <th class="title"> Wl Feeding6: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_feeding6_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_feeding6']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_feeding6" 
                                                data-title="Enter WHEEL FEEDING" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_feeding6']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_feeding7">
                                        <th class="title"> Wl Feeding7: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_feeding7_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_feeding7']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_feeding7" 
                                                data-title="Enter WHEEL FEEDING" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_feeding7']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_feeding8">
                                        <th class="title"> Wl Feeding8: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_feeding8_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_feeding8']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_feeding8" 
                                                data-title="Enter WHEEL FEEDING" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_feeding8']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_8mtr1">
                                        <th class="title"> Wl 8Mtr1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_8mtr1_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_8mtr1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_8mtr1" 
                                                data-title="Enter Wheel 8Mtr" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_8mtr1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_11mtr1">
                                        <th class="title"> Wl 11Mtr1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_11mtr1_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_11mtr1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_11mtr1" 
                                                data-title="Enter Wheel 11Mtr" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_11mtr1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_psm1">
                                        <th class="title"> Wl Psm1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_psm1_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_psm1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_psm1" 
                                                data-title="Enter Wheel PSM" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_psm1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_psm2">
                                        <th class="title"> Wl Psm2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_psm2_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_psm2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_psm2" 
                                                data-title="Enter Wheel PSM" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_psm2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_8mtr2">
                                        <th class="title"> Wl 8Mtr2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_8mtr2_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_8mtr2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_8mtr2" 
                                                data-title="Enter Wheel 8Mtr" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_8mtr2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_11mtr2">
                                        <th class="title"> Wl 11Mtr2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_11mtr2_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_11mtr2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_11mtr2" 
                                                data-title="Enter Wheel 11Mtr" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_11mtr2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_mico2">
                                        <th class="title"> Wl Mico2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_mico2_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_mico2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_mico2" 
                                                data-title="Enter Wheel MICO Operator" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_mico2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_mico3">
                                        <th class="title"> Wl Mico3: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_mico3_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_mico3']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_mico3" 
                                                data-title="Enter Wheel MICO Operator" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_mico3']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_mico4">
                                        <th class="title"> Wl Mico4: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_mico4_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_mico4']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_mico4" 
                                                data-title="Enter Wheel MICO Operator" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_mico4']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_mico5">
                                        <th class="title"> Wl Mico5: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_mico5_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_mico5']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_mico5" 
                                                data-title="Enter Wheel MICO Operator" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_mico5']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_mico6">
                                        <th class="title"> Wl Mico6: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_mico6_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_mico6']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_mico6" 
                                                data-title="Enter Wheel MICO Operator" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_mico6']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_subham2">
                                        <th class="title"> Wl Subham2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_subham2_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_subham2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_subham2" 
                                                data-title="Enter Wheel Subham Operator" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_subham2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_subham3">
                                        <th class="title"> Wl Subham3: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_subham3_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_subham3']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_subham3" 
                                                data-title="Enter Wheel Subham Operator" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_subham3']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_subham4">
                                        <th class="title"> Wl Subham4: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_subham4_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_subham4']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_subham4" 
                                                data-title="Enter Wheel Subham Operator" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_subham4']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_subham1">
                                        <th class="title"> Wl Subham1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_subham1_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_subham1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_subham1" 
                                                data-title="Enter Wheel Subham Operator" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_subham1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_mico1">
                                        <th class="title"> Wl Mico1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_mico1_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_mico1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_mico1" 
                                                data-title="Enter Wheel MICO Operator" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_mico1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_bagger4">
                                        <th class="title"> Wl Bagger4: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_bagger4_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_bagger4']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_bagger4" 
                                                data-title="Enter Wheel Bagger" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_bagger4']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_bagger2">
                                        <th class="title"> Wl Bagger2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_bagger2_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_bagger2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_bagger2" 
                                                data-title="Enter Wheel Bagger" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_bagger2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_bagger3">
                                        <th class="title"> Wl Bagger3: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_bagger3_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_bagger3']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_bagger3" 
                                                data-title="Enter Wheel Bagger" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_bagger3']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_ws4">
                                        <th class="title"> Wl Ws4: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_ws4_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_ws4']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_ws4" 
                                                data-title="Enter Wheel Weighing & Stitching" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_ws4']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_ws3">
                                        <th class="title"> Wl Ws3: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_ws3_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_ws3']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_ws3" 
                                                data-title="Enter Wheel Weighing & Stitching" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_ws3']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_ws2">
                                        <th class="title"> Wl Ws2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_ws2_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_ws2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_ws2" 
                                                data-title="Enter Wheel Weighing & Stitching" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_ws2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_ws1">
                                        <th class="title"> Wl Ws1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_ws1_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_ws1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_ws1" 
                                                data-title="Enter Wheel Weighing & Stitching" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_ws1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_stacking1">
                                        <th class="title"> Wl Stacking1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_stacking1_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_stacking1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_stacking1" 
                                                data-title="Enter Wheel Stacking" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_stacking1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_stacking2">
                                        <th class="title"> Wl Stacking2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_stacking2_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_stacking2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_stacking2" 
                                                data-title="Enter Wheel Stacking" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_stacking2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_stacking3">
                                        <th class="title"> Wl Stacking3: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_stacking3_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_stacking3']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_stacking3" 
                                                data-title="Enter Wheel Stacking" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_stacking3']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_stacking4">
                                        <th class="title"> Wl Stacking4: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_stacking4_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_stacking4']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_stacking4" 
                                                data-title="Enter Wheel Stacking" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_stacking4']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_stacking5">
                                        <th class="title"> Wl Stacking5: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_stacking5_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_stacking5']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_stacking5" 
                                                data-title="Enter Wheel Stacking" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_stacking5']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_stacking6">
                                        <th class="title"> Wl Stacking6: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_stacking6_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_stacking6']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_stacking6" 
                                                data-title="Enter Wheel Stacking" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_stacking6']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-dmx_sigma1">
                                        <th class="title"> Dmx Sigma1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_dmx_sigma1_option_list'); ?>' 
                                                data-value="<?php echo $data['dmx_sigma1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="dmx_sigma1" 
                                                data-title="Enter Domex Sigma" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['dmx_sigma1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-dmx_subham1">
                                        <th class="title"> Dmx Subham1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_dmx_subham1_option_list'); ?>' 
                                                data-value="<?php echo $data['dmx_subham1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="dmx_subham1" 
                                                data-title="Enter Domex Subham" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['dmx_subham1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-dmx_subham2">
                                        <th class="title"> Dmx Subham2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_dmx_subham2_option_list'); ?>' 
                                                data-value="<?php echo $data['dmx_subham2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="dmx_subham2" 
                                                data-title="Enter Domex Subham" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['dmx_subham2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-dmx_hasia1">
                                        <th class="title"> Dmx Hasia1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_dmx_hasia1_option_list'); ?>' 
                                                data-value="<?php echo $data['dmx_hasia1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="dmx_hasia1" 
                                                data-title="Enter Domex Hasia" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['dmx_hasia1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-dmx_bagger1">
                                        <th class="title"> Dmx Bagger1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_dmx_bagger1_option_list'); ?>' 
                                                data-value="<?php echo $data['dmx_bagger1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="dmx_bagger1" 
                                                data-title="Enter Domex Bagger" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['dmx_bagger1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-dmx_ws1">
                                        <th class="title"> Dmx Ws1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_dmx_ws1_option_list'); ?>' 
                                                data-value="<?php echo $data['dmx_ws1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="dmx_ws1" 
                                                data-title="Enter Domex Weighing & Stitching" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['dmx_ws1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-dmx_stacking1">
                                        <th class="title"> Dmx Stacking1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_dmx_stacking1_option_list'); ?>' 
                                                data-value="<?php echo $data['dmx_stacking1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="dmx_stacking1" 
                                                data-title="Enter Domex Stacking" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['dmx_stacking1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_feeding1">
                                        <th class="title"> Ew Feeding1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_feeding1_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_feeding1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_feeding1" 
                                                data-title="Enter EW Feeding" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_feeding1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_boone1">
                                        <th class="title"> Ew Boone1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_boone1_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_boone1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_boone1" 
                                                data-title="Enter EW BOONE MIXER OPERATOR" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_boone1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_fg1">
                                        <th class="title"> Ew Fg1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_fg1_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_fg1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_fg1" 
                                                data-title="Enter EW F.G HANDLING SECTION" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_fg1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_fg2">
                                        <th class="title"> Ew Fg2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_fg2_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_fg2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_fg2" 
                                                data-title="Enter EW F.G HANDLING SECTION" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_fg2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_fg3">
                                        <th class="title"> Ew Fg3: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_fg3_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_fg3']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_fg3" 
                                                data-title="Enter EW F.G HANDLING SECTION" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_fg3']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_fg4">
                                        <th class="title"> Ew Fg4: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_fg4_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_fg4']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_fg4" 
                                                data-title="Enter EW F.G HANDLING SECTION" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_fg4']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_fg6">
                                        <th class="title"> Ew Fg6: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_fg6_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_fg6']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_fg6" 
                                                data-title="Enter EW F.G HANDLING SECTION" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_fg6']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_fg7">
                                        <th class="title"> Ew Fg7: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_fg7_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_fg7']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_fg7" 
                                                data-title="Enter EW F.G HANDLING SECTION" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_fg7']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_subham1">
                                        <th class="title"> Ew Subham1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_subham1_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_subham1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_subham1" 
                                                data-title="Enter EW SUBHAM P/C M/C  OPERATOR" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_subham1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_subham2">
                                        <th class="title"> Ew Subham2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_subham2_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_subham2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_subham2" 
                                                data-title="Enter EW SUBHAM P/C M/C  OPERATOR" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_subham2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_subham3">
                                        <th class="title"> Ew Subham3: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_subham3_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_subham3']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_subham3" 
                                                data-title="Enter EW SUBHAM P/C M/C  OPERATOR" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_subham3']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_subham4">
                                        <th class="title"> Ew Subham4: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_subham4_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_subham4']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_subham4" 
                                                data-title="Enter EW SUBHAM P/C M/C  OPERATOR" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_subham4']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_subham5">
                                        <th class="title"> Ew Subham5: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_subham5_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_subham5']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_subham5" 
                                                data-title="Enter EW SUBHAM P/C M/C  OPERATOR" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_subham5']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_subham6">
                                        <th class="title"> Ew Subham6: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_subham6_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_subham6']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_subham6" 
                                                data-title="Enter EW SUBHAM P/C M/C  OPERATOR" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_subham6']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_subham7">
                                        <th class="title"> Ew Subham7: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_subham7_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_subham7']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_subham7" 
                                                data-title="Enter EW SUBHAM P/C M/C  OPERATOR" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_subham7']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_bagger1">
                                        <th class="title"> Ew Bagger1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_bagger1_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_bagger1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_bagger1" 
                                                data-title="Enter EW Bagger" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_bagger1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_bagger2">
                                        <th class="title"> Ew Bagger2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_bagger2_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_bagger2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_bagger2" 
                                                data-title="Enter EW Bagger" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_bagger2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_bagger3">
                                        <th class="title"> Ew Bagger3: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_bagger3_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_bagger3']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_bagger3" 
                                                data-title="Enter EW Bagger" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_bagger3']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_bagger4">
                                        <th class="title"> Ew Bagger4: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_bagger4_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_bagger4']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_bagger4" 
                                                data-title="Enter EW Bagger" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_bagger4']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_bagger5">
                                        <th class="title"> Ew Bagger5: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_bagger5_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_bagger5']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_bagger5" 
                                                data-title="Enter EW Bagger" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_bagger5']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_bagger6">
                                        <th class="title"> Ew Bagger6: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_bagger6_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_bagger6']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_bagger6" 
                                                data-title="Enter EW Bagger" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_bagger6']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_bagger7">
                                        <th class="title"> Ew Bagger7: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_bagger7_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_bagger7']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_bagger7" 
                                                data-title="Enter EW Bagger" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_bagger7']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_stacking2">
                                        <th class="title"> Ew Stacking2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_stacking2_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_stacking2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_stacking2" 
                                                data-title="Enter EW Stacking" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_stacking2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_stacking3">
                                        <th class="title"> Ew Stacking3: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_stacking3_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_stacking3']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_stacking3" 
                                                data-title="Enter EW Stacking" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_stacking3']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_stacking4">
                                        <th class="title"> Ew Stacking4: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_stacking4_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_stacking4']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_stacking4" 
                                                data-title="Enter EW Stacking" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_stacking4']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_stacking5">
                                        <th class="title"> Ew Stacking5: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_stacking5_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_stacking5']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_stacking5" 
                                                data-title="Enter EW Stacking" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_stacking5']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_stacking6">
                                        <th class="title"> Ew Stacking6: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_stacking6_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_stacking6']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_stacking6" 
                                                data-title="Enter EW Stacking" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_stacking6']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_stacking7">
                                        <th class="title"> Ew Stacking7: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_stacking7_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_stacking7']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_stacking7" 
                                                data-title="Enter EW Stacking" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_stacking7']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_stacking8">
                                        <th class="title"> Ew Stacking8: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_stacking8_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_stacking8']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_stacking8" 
                                                data-title="Enter EW Stacking" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_stacking8']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_stacking9">
                                        <th class="title"> Ew Stacking9: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_stacking9_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_stacking9']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_stacking9" 
                                                data-title="Enter EW Stacking" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_stacking9']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_ws1">
                                        <th class="title"> Ew Ws1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_ws1_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_ws1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_ws1" 
                                                data-title="Enter EW Weighing Stitching" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_ws1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_ws2">
                                        <th class="title"> Ew Ws2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_ws2_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_ws2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_ws2" 
                                                data-title="Enter EW Weighing Stitching" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_ws2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_ws3">
                                        <th class="title"> Ew Ws3: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_ws3_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_ws3']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_ws3" 
                                                data-title="Enter EW Weighing Stitching" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_ws3']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_ws4">
                                        <th class="title"> Ew Ws4: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_ws4_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_ws4']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_ws4" 
                                                data-title="Enter EW Weighing Stitching" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_ws4']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_big1">
                                        <th class="title"> Ew Big1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_big1_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_big1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_big1" 
                                                data-title="Enter EW Big Bag Station" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_big1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_big3">
                                        <th class="title"> Ew Big3: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_big3_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_big3']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_big3" 
                                                data-title="Enter EW Big Bag Station" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_big3']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_big4">
                                        <th class="title"> Ew Big4: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_big4_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_big4']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_big4" 
                                                data-title="Enter EW Big Bag Station" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_big4']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_big2">
                                        <th class="title"> Ew Big2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_big2_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_big2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_big2" 
                                                data-title="Enter EW Big Bag Station" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_big2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-minor4">
                                        <th class="title"> Minor4: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_minor4_option_list'); ?>' 
                                                data-value="<?php echo $data['minor4']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="minor4" 
                                                data-title="Enter MINORS WEIGHING & OTHER RM LOADER" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['minor4']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_bagger1">
                                        <th class="title"> Wl Bagger1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_bagger1_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_bagger1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_bagger1" 
                                                data-title="Enter Wheel Bagger" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_bagger1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-dmx_feeding1">
                                        <th class="title"> Dmx Feeding1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_dmx_feeding1_option_list'); ?>' 
                                                data-value="<?php echo $data['dmx_feeding1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="dmx_feeding1" 
                                                data-title="Enter Domex Feeding" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['dmx_feeding1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-dmx_stacking2">
                                        <th class="title"> Dmx Stacking2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_dmx_stacking2_option_list'); ?>' 
                                                data-value="<?php echo $data['dmx_stacking2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="dmx_stacking2" 
                                                data-title="Enter Domex Stacking" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['dmx_stacking2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-dmx_ws2">
                                        <th class="title"> Dmx Ws2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_dmx_ws2_option_list'); ?>' 
                                                data-value="<?php echo $data['dmx_ws2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="dmx_ws2" 
                                                data-title="Enter Domex Weighing & Stitching" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['dmx_ws2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_bosch1">
                                        <th class="title"> Ew Bosch1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_bosch1_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_bosch1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_bosch1" 
                                                data-title="Enter EW BOSCH OPERATOR (B-25+26)" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_bosch1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_bosch2">
                                        <th class="title"> Ew Bosch2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_bosch2_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_bosch2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_bosch2" 
                                                data-title="Enter EW BOSCH OPERATOR (B-25+26)" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_bosch2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_stacking1">
                                        <th class="title"> Ew Stacking1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_stacking1_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_stacking1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_stacking1" 
                                                data-title="Enter EW Stacking" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_stacking1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ew_stacking10">
                                        <th class="title"> Ew Stacking10: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_ew_stacking10_option_list'); ?>' 
                                                data-value="<?php echo $data['ew_stacking10']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ew_stacking10" 
                                                data-title="Enter EW Stacking" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ew_stacking10']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-olc">
                                        <th class="title"> Olc: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_olc_option_list'); ?>' 
                                                data-value="<?php echo $data['olc']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="olc" 
                                                data-title="Enter OLC Operator" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['olc']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-warehouse">
                                        <th class="title"> Warehouse: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_warehouse_option_list'); ?>' 
                                                data-value="<?php echo $data['warehouse']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="warehouse" 
                                                data-title="Enter Warehouse" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['warehouse']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-bag_coding">
                                        <th class="title"> Bag Coding: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_bag_coding_option_list'); ?>' 
                                                data-value="<?php echo $data['bag_coding']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="bag_coding" 
                                                data-title="Enter Bag Coding" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['bag_coding']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-store_incharge">
                                        <th class="title"> Store Incharge: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_store_incharge_option_list'); ?>' 
                                                data-value="<?php echo $data['store_incharge']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="store_incharge" 
                                                data-title="Enter Store Incharge" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['store_incharge']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt_variation_checker">
                                        <th class="title"> Wt Variation Checker: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wt_variation_checker_option_list'); ?>' 
                                                data-value="<?php echo $data['wt_variation_checker']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt_variation_checker" 
                                                data-title="Enter Weight Variation Checker" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt_variation_checker']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_bagger6">
                                        <th class="title"> Wl Bagger6: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_bagger6_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_bagger6']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_bagger6" 
                                                data-title="Enter Wheel Bagger" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_bagger6']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_ws6">
                                        <th class="title"> Wl Ws6: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_ws6_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_ws6']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_ws6" 
                                                data-title="Enter Wheel Weighing & Stitching" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_ws6']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_bagger5">
                                        <th class="title"> Wl Bagger5: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_bagger5_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_bagger5']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_bagger5" 
                                                data-title="Enter Wheel Bagger" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_bagger5']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_ws5">
                                        <th class="title"> Wl Ws5: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_ws5_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_ws5']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_ws5" 
                                                data-title="Enter Wheel Weighing & Stitching" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_ws5']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_subhambagger4t">
                                        <th class="title"> Wl Subhambagger4t: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_subhambagger4t_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_subhambagger4t']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_subhambagger4t" 
                                                data-title="Enter Wheel Subham Bagger-4T" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_subhambagger4t']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wl_subhambagger5t">
                                        <th class="title"> Wl Subhambagger5t: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/emp_wl_subhambagger5t_option_list'); ?>' 
                                                data-value="<?php echo $data['wl_subhambagger5t']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("emp/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wl_subhambagger5t" 
                                                data-title="Enter Wheel Subham Bagger-5T" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wl_subhambagger5t']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                                <!-- Table Body End -->
                            </table>
                        </div>
                        <div class="p-3 d-flex">
                            <div class="dropup export-btn-holder mx-1">
                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-save"></i> Export
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <?php $export_print_link = $this->set_current_page_link(array('format' => 'print')); ?>
                                    <a class="dropdown-item export-link-btn" data-format="print" href="<?php print_link($export_print_link); ?>" target="_blank">
                                        <img src="<?php print_link('assets/images/print.png') ?>" class="mr-2" /> PRINT
                                        </a>
                                        <?php $export_pdf_link = $this->set_current_page_link(array('format' => 'pdf')); ?>
                                        <a class="dropdown-item export-link-btn" data-format="pdf" href="<?php print_link($export_pdf_link); ?>" target="_blank">
                                            <img src="<?php print_link('assets/images/pdf.png') ?>" class="mr-2" /> PDF
                                            </a>
                                            <?php $export_word_link = $this->set_current_page_link(array('format' => 'word')); ?>
                                            <a class="dropdown-item export-link-btn" data-format="word" href="<?php print_link($export_word_link); ?>" target="_blank">
                                                <img src="<?php print_link('assets/images/doc.png') ?>" class="mr-2" /> WORD
                                                </a>
                                                <?php $export_csv_link = $this->set_current_page_link(array('format' => 'csv')); ?>
                                                <a class="dropdown-item export-link-btn" data-format="csv" href="<?php print_link($export_csv_link); ?>" target="_blank">
                                                    <img src="<?php print_link('assets/images/csv.png') ?>" class="mr-2" /> CSV
                                                    </a>
                                                    <?php $export_excel_link = $this->set_current_page_link(array('format' => 'excel')); ?>
                                                    <a class="dropdown-item export-link-btn" data-format="excel" href="<?php print_link($export_excel_link); ?>" target="_blank">
                                                        <img src="<?php print_link('assets/images/xsl.png') ?>" class="mr-2" /> EXCEL
                                                        </a>
                                                    </div>
                                                </div>
                                                <?php if($can_edit){ ?>
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("emp/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("emp/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                    <i class="fa fa-times"></i> Delete
                                                </a>
                                                <?php } ?>
                                            </div>
                                            <?php
                                            }
                                            else{
                                            ?>
                                            <!-- Empty Record Message -->
                                            <div class="text-muted p-3">
                                                <i class="fa fa-ban"></i> No Record Found
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
