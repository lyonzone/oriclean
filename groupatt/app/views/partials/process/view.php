<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("process/add");
$can_edit = ACL::is_allowed("process/edit");
$can_view = ACL::is_allowed("process/view");
$can_delete = ACL::is_allowed("process/delete");
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
                    <h4 class="record-title">View  Production Log Book</h4>
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
                                            <?php
                                            $page_fields = array('date' => $data['date'],'shift' => $data['shift'],'grp' => $data['grp']);
                                            $page_link = "masterdetail/index/process/wastagelogs/date/" . urlencode($data['date']);
                                            $md_pagelink = set_page_link($page_link, $page_fields); 
                                            ?>
                                            <a size="sm" class="btn btn-sm btn-primary page-modal" href="<?php print_link($md_pagelink) ?>">
                                                <i class="fa fa-eye"></i> <?php echo $data['date'] ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr  class="td-shift">
                                        <th class="title"> Shift: </th>
                                        <td class="value">
                                            <?php
                                            $page_fields = array('shift' => $data['shift'],'grp' => $data['grp'],'date' => $data['date']);
                                            $page_link = "masterdetail/index/process/wastagelogs/date/" . urlencode($data['date']);
                                            $md_pagelink = set_page_link($page_link, $page_fields); 
                                            ?>
                                            <a size="sm" class="btn btn-sm btn-primary page-modal" href="<?php print_link($md_pagelink) ?>">
                                                <i class="fa fa-eye"></i> <?php echo $data['shift'] ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr  class="td-grp">
                                        <th class="title"> Grp: </th>
                                        <td class="value">
                                            <a size="sm" class="btn btn-sm btn-primary page-modal" href="<?php print_link("masterdetail/index/process/packing/id/" . urlencode($data['id'])) ?>">
                                                <i class="fa fa-eye"></i> <?php echo $data['grp'] ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr  class="td-pink">
                                        <th class="title"> Pink: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['pink']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="pink" 
                                                data-title="Enter Pink (Batch)" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['pink']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-blue">
                                        <th class="title"> Blue: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['blue']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="blue" 
                                                data-title="Enter Blue (Batch)" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['blue']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-domex">
                                        <th class="title"> Domex: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['domex']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="domex" 
                                                data-title="Enter Domex (Batch)" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['domex']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-easywash">
                                        <th class="title"> Easywash: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['easywash']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="easywash" 
                                                data-title="Enter Easywash G1 (Batch)" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['easywash']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-fg">
                                        <th class="title"> Fg: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['fg']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="fg" 
                                                data-title="Enter Fg (Batch)" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['fg']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-batch_size">
                                        <th class="title"> Batch Size: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['batch_size']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="batch_size" 
                                                data-title="Enter EW Batch Size" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['batch_size']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-manpower">
                                        <th class="title"> Manpower: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-man_other">
                                        <th class="title"> Man Other: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['man_other']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="man_other" 
                                                data-title="Enter Manpower shifted to other location" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['man_other']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wh60m10">
                                        <th class="title"> Wh60m10: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-wh155m2">
                                        <th class="title"> Wh155m2: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-wh155m3">
                                        <th class="title"> Wh155m3: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-wh155m4">
                                        <th class="title"> Wh155m4: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-wh400m4">
                                        <th class="title"> Wh400m4: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-wh400m7">
                                        <th class="title"> Wh400m7: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-wh400m8">
                                        <th class="title"> Wh400m8: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-wh400m9">
                                        <th class="title"> Wh400m9: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-wh1000m7">
                                        <th class="title"> Wh1000m7: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-wh1000m8">
                                        <th class="title"> Wh1000m8: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-wh2000m7">
                                        <th class="title"> Wh2000m7: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-wh2000m8">
                                        <th class="title"> Wh2000m8: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-d20m17">
                                        <th class="title"> D20m17: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-d100m18">
                                        <th class="title"> D100m18: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-d250m16">
                                        <th class="title"> D250m16: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-d400m16">
                                        <th class="title"> D400m16: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-ew90m20">
                                        <th class="title"> Ew90m20: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-ew90m21">
                                        <th class="title"> Ew90m21: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-ew90m22">
                                        <th class="title"> Ew90m22: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-ew90m23">
                                        <th class="title"> Ew90m23: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-ew90m24">
                                        <th class="title"> Ew90m24: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-ew90m27">
                                        <th class="title"> Ew90m27: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-ew100m20">
                                        <th class="title"> Ew100m20: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-ew100m21">
                                        <th class="title"> Ew100m21: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-ew100m22">
                                        <th class="title"> Ew100m22: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-ew100m23">
                                        <th class="title"> Ew100m23: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-ew100m24">
                                        <th class="title"> Ew100m24: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-ew100m27">
                                        <th class="title"> Ew100m27: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-ew500m25">
                                        <th class="title"> Ew500m25: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-ew500m26">
                                        <th class="title"> Ew500m26: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-ew1000m25">
                                        <th class="title"> Ew1000m25: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-ew1000m26">
                                        <th class="title"> Ew1000m26: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-Wh150m2">
                                        <th class="title"> Wh150m2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Wh150m2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="Wh150m2" 
                                                data-title="Enter Wh150m2" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Wh150m2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Wh150m3">
                                        <th class="title"> Wh150m3: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Wh150m3']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="Wh150m3" 
                                                data-title="Enter Wh150m3" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Wh150m3']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Wh150m4">
                                        <th class="title"> Wh150m4: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Wh150m4']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("process/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="Wh150m4" 
                                                data-title="Enter Wh150m4" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Wh150m4']; ?> 
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
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("process/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("process/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
