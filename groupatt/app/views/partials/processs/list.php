<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("process/add");
$can_edit = ACL::is_allowed("process/edit");
$can_view = ACL::is_allowed("process/view");
$can_delete = ACL::is_allowed("process/delete");
?>
<?php
$comp_model = new SharedController;
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data From Controller
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Process</h4>
                </div>
                <div class="col-sm-3 ">
                    <?php if($can_add){ ?>
                    <a  class="btn btn btn-primary my-1" href="<?php print_link("process/add") ?>">
                        <i class="fa fa-plus"></i>                              
                        Add New Process 
                    </a>
                    <?php } ?>
                </div>
                <div class="col-sm-4 ">
                    <form  class="search" action="<?php print_link('process'); ?>" method="get">
                        <div class="input-group">
                            <input value="<?php echo get_value('search'); ?>" class="form-control" type="text" name="search"  placeholder="Search" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12 comp-grid">
                        <div class="">
                            <!-- Page bread crumbs components-->
                            <?php
                            if(!empty($field_name) || !empty($_GET['search'])){
                            ?>
                            <hr class="sm d-block d-sm-none" />
                            <nav class="page-header-breadcrumbs mt-2" aria-label="breadcrumb">
                                <ul class="breadcrumb m-0 p-1">
                                    <?php
                                    if(!empty($field_name)){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('process'); ?>">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <?php echo (get_value("tag") ? get_value("tag")  :  make_readable($field_name)); ?>
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold">
                                        <?php echo (get_value("label") ? get_value("label")  :  make_readable(urldecode($field_value))); ?>
                                    </li>
                                    <?php 
                                    }   
                                    ?>
                                    <?php
                                    if(get_value("search")){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('process'); ?>">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item text-capitalize">
                                        Search
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold"><?php echo get_value("search"); ?></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </nav>
                            <!--End of Page bread crumbs components-->
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
        <div  class="">
            <div class="">
                <div class="row ">
                    <div class="col-md-12 ">
                        <?php $this :: display_page_errors(); ?>
                        <div  class=" animated fadeIn page-content">
                            <div id="process-list-records">
                                <div id="page-report-body" class="table-responsive">
                                    <table class="table  table-striped table-sm text-left">
                                        <thead class="table-header bg-light">
                                            <tr>
                                                <?php if($can_delete){ ?>
                                                <th class="td-checkbox">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                        <input class="toggle-check-all custom-control-input" type="checkbox" />
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </th>
                                                <?php } ?>
                                                <th class="td-sno">#</th>
                                                <th  class="td-date"> Date</th>
                                                <th  class="td-shift"> Shift</th>
                                                <th  class="td-pink"> P</th>
                                                <th  class="td-blue"> B</th>
                                                <th  class="td-domex"> D</th>
                                                <th  class="td-easywash"> EW</th>
                                                <th  <?php echo (get_value('orderby')=='grp' ? 'class="sortedby td-grp"' : null); ?>>
                                                    <?php Html :: get_field_order_link('grp', "Grp"); ?>
                                                </th>
                                                <th  class="td-manpower"> Man</th>
                                                <th  class="td-domexmt"> Domex MT</th>
                                                <th  class="td-wh60m10"> Wh60m10</th>
                                                <th  class="td-wh155m2"> Wh155m2</th>
                                                <th  class="td-wh400m4"> Wh400m4</th>
                                                <th  class="td-wh1000m7"> Wh1000m7</th>
                                                <th  class="td-wh2000m7"> Wh2000m7</th>
                                                <th  class="td-d20m17"> D20m17</th>
                                                <th  class="td-d100m18"> D100m18</th>
                                                <th  class="td-d250m16"> D250m16</th>
                                                <th  class="td-d400m16"> D400m16</th>
                                                <th  class="td-ew90m20"> Ew90m20</th>
                                                <th  class="td-ew500m25"> Ew500m25</th>
                                                <th  class="td-ew1000m25"> Ew1000m25</th>
                                                <th  class="td-ew100m20"> Ew100m20</th>
                                                <th  class="td-wh155m3"> Wh155m3</th>
                                                <th  class="td-wh155m4"> Wh155m4</th>
                                                <th  class="td-wh400m7"> Wh400m7</th>
                                                <th  class="td-wh400m8"> Wh400m8</th>
                                                <th  class="td-wh400m9"> Wh400m9</th>
                                                <th  class="td-wh1000m8"> Wh1000m8</th>
                                                <th  class="td-wh2000m8"> Wh2000m8</th>
                                                <th  class="td-ew90m21"> Ew90m21</th>
                                                <th  class="td-ew90m22"> Ew90m22</th>
                                                <th  class="td-ew90m23"> Ew90m23</th>
                                                <th  class="td-ew90m24"> Ew90m24</th>
                                                <th  class="td-ew90m27"> Ew90m27</th>
                                                <th  class="td-ew100m21"> Ew100m21</th>
                                                <th  class="td-ew100m22"> Ew100m22</th>
                                                <th  class="td-ew100m23"> Ew100m23</th>
                                                <th  class="td-ew100m24"> Ew100m24</th>
                                                <th  class="td-ew100m27"> Ew100m27</th>
                                                <th  class="td-ew500m26"> Ew500m26</th>
                                                <th  class="td-ew1000m26"> Ew1000m26</th>
                                                <th class="td-btn"></th>
                                            </tr>
                                        </thead>
                                        <?php
                                        if(!empty($records)){
                                        ?>
                                        <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                            <!--record-->
                                            <?php
                                            $counter = 0;
                                            foreach($records as $data){
                                            $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                                            $counter++;
                                            ?>
                                            <tr>
                                                <?php if($can_delete){ ?>
                                                <th class=" td-checkbox">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                        <input class="optioncheck custom-control-input" name="optioncheck[]" value="<?php echo $data['id'] ?>" type="checkbox" />
                                                            <span class="custom-control-label"></span>
                                                        </label>
                                                    </th>
                                                    <?php } ?>
                                                    <th class="td-sno"><?php echo $counter; ?></th>
                                                    <td class="td-date"> <span><?php echo $data['date']; ?></span></td>
                                                    <td class="td-shift">
                                                        <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/process_shift_option_list'); ?>' 
                                                            data-value="<?php echo $data['shift']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="shift" 
                                                            data-title="Enter Shift" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['shift']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-pink">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['pink']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="pink" 
                                                            data-title="Enter Pink" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['pink']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-blue">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['blue']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="blue" 
                                                            data-title="Enter Blue" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['blue']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-domex">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['domex']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="domex" 
                                                            data-title="Enter Domex" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['domex']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-easywash">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['easywash']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="easywash" 
                                                            data-title="Enter Easywash" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['easywash']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-grp">
                                                        <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/process_grp_option_list'); ?>' 
                                                            data-value="<?php echo $data['grp']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="grp" 
                                                            data-title="Select a value ..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['grp']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-manpower">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['manpower']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="manpower" 
                                                            data-title="Enter Manpower" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['manpower']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-domexmt"> <?php echo $data['domexmt']; ?></td>
                                                    <td class="td-wh60m10">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['wh60m10']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="wh60m10" 
                                                            data-title="Enter Wh60m10" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['wh60m10']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-wh155m2">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['wh155m2']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="wh155m2" 
                                                            data-title="Enter Wh155m2" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['wh155m2']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-wh400m4">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['wh400m4']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="wh400m4" 
                                                            data-title="Enter Wh400m4" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['wh400m4']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-wh1000m7">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['wh1000m7']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="wh1000m7" 
                                                            data-title="Enter Wh1000m7" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['wh1000m7']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-wh2000m7">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['wh2000m7']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="wh2000m7" 
                                                            data-title="Enter Wh2000m7" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['wh2000m7']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-d20m17">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['d20m17']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="d20m17" 
                                                            data-title="Enter D20m17" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['d20m17']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-d100m18">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['d100m18']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="d100m18" 
                                                            data-title="Enter D100m18" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['d100m18']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-d250m16">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['d250m16']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="d250m16" 
                                                            data-title="Enter D250m16" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['d250m16']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-d400m16">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['d400m16']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="d400m16" 
                                                            data-title="Enter D400m16" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['d400m16']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-ew90m20">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['ew90m20']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="ew90m20" 
                                                            data-title="Enter Ew90m20" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['ew90m20']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-ew500m25">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['ew500m25']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="ew500m25" 
                                                            data-title="Enter Ew500m25" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['ew500m25']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-ew1000m25">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['ew1000m25']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="ew1000m25" 
                                                            data-title="Enter Ew1000m25" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['ew1000m25']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-ew100m20">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['ew100m20']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="ew100m20" 
                                                            data-title="Enter Ew100m20" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['ew100m20']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-wh155m3">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['wh155m3']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="wh155m3" 
                                                            data-title="Enter Wh155m3" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['wh155m3']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-wh155m4">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['wh155m4']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="wh155m4" 
                                                            data-title="Enter Wh155m4" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['wh155m4']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-wh400m7">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['wh400m7']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="wh400m7" 
                                                            data-title="Enter Wh400m7" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['wh400m7']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-wh400m8">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['wh400m8']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="wh400m8" 
                                                            data-title="Enter Wh400m8" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['wh400m8']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-wh400m9">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['wh400m9']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="wh400m9" 
                                                            data-title="Enter Wh400m9" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['wh400m9']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-wh1000m8">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['wh1000m8']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="wh1000m8" 
                                                            data-title="Enter Wh1000m8" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['wh1000m8']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-wh2000m8">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['wh2000m8']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="wh2000m8" 
                                                            data-title="Enter Wh2000m8" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['wh2000m8']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-ew90m21">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['ew90m21']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="ew90m21" 
                                                            data-title="Enter Ew90m21" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['ew90m21']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-ew90m22">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['ew90m22']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="ew90m22" 
                                                            data-title="Enter Ew90m22" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['ew90m22']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-ew90m23">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['ew90m23']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="ew90m23" 
                                                            data-title="Enter Ew90m23" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['ew90m23']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-ew90m24">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['ew90m24']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="ew90m24" 
                                                            data-title="Enter Ew90m24" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['ew90m24']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-ew90m27">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['ew90m27']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="ew90m27" 
                                                            data-title="Enter Ew90m27" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['ew90m27']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-ew100m21">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['ew100m21']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="ew100m21" 
                                                            data-title="Enter Ew100m21" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['ew100m21']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-ew100m22">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['ew100m22']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="ew100m22" 
                                                            data-title="Enter Ew100m22" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['ew100m22']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-ew100m23">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['ew100m23']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="ew100m23" 
                                                            data-title="Enter Ew100m23" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['ew100m23']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-ew100m24">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['ew100m24']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="ew100m24" 
                                                            data-title="Enter Ew100m24" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['ew100m24']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-ew100m27">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['ew100m27']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="ew100m27" 
                                                            data-title="Enter Ew100m27" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['ew100m27']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-ew500m26">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['ew500m26']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="ew500m26" 
                                                            data-title="Enter Ew500m26" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['ew500m26']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-ew1000m26">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['ew1000m26']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="ew1000m26" 
                                                            data-title="Enter Ew1000m26" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['ew1000m26']; ?> 
                                                        </span>
                                                    </td>
                                                    <th class="td-btn">
                                                        <?php if($can_view){ ?>
                                                        <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("process/view/$rec_id"); ?>">
                                                            <i class="fa fa-eye"></i> View
                                                        </a>
                                                        <?php } ?>
                                                        <?php if($can_edit){ ?>
                                                        <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("process/edit/$rec_id"); ?>">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </a>
                                                        <?php } ?>
                                                        <?php if($can_delete){ ?>
                                                        <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("process/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                            <i class="fa fa-times"></i>
                                                            Delete
                                                        </a>
                                                        <?php } ?>
                                                    </th>
                                                </tr>
                                                <?php 
                                                }
                                                ?>
                                                <!--endrecord-->
                                            </tbody>
                                            <tbody class="search-data" id="search-data-<?php echo $page_element_id; ?>"></tbody>
                                            <?php
                                            }
                                            ?>
                                        </table>
                                        <?php 
                                        if(empty($records)){
                                        ?>
                                        <h4 class="bg-light text-center border-top text-muted animated bounce  p-3">
                                            <i class="fa fa-ban"></i> No record found
                                        </h4>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    if( $show_footer && !empty($records)){
                                    ?>
                                    <div class=" border-top mt-2">
                                        <div class="row justify-content-center">    
                                            <div class="col-md-auto justify-content-center">    
                                                <div class="p-3 d-flex justify-content-between">    
                                                    <?php if($can_delete){ ?>
                                                    <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("process/delete/{sel_ids}/?csrf_token=$csrf_token&redirect=$current_page"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
                                                        <i class="fa fa-times"></i> Delete Selected
                                                    </button>
                                                    <?php } ?>
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
                                                                    </div>
                                                                </div>
                                                                <div class="col">   
                                                                    <?php
                                                                    if($show_pagination == true){
                                                                    $pager = new Pagination($total_records, $record_count);
                                                                    $pager->route = $this->route;
                                                                    $pager->show_page_count = true;
                                                                    $pager->show_record_count = true;
                                                                    $pager->show_page_limit =true;
                                                                    $pager->limit_count = $this->limit_count;
                                                                    $pager->show_page_number_list = true;
                                                                    $pager->pager_link_range=5;
                                                                    $pager->render();
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
