<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("process/add");
$can_edit = ACL::is_allowed("process/edit");
$can_view = ACL::is_allowed("process/view");
$can_delete = ACL::is_allowed("process/delete");
?>
<?php
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
if (!empty($records)) {
?>
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
        <td class="td-date"> <?php echo $data['date']; ?></td>
        <td class="td-shift">
            <?php
            $page_fields = array('shift' => $data['shift'],'grp' => $data['grp'],'date' => $data['date']);
            $page_link = "masterdetail/index/process/wastagelogs/date/" . urlencode($data['date']);
            $md_pagelink = set_page_link($page_link, $page_fields); 
            ?>
            <a size="sm" class="btn btn-sm btn-primary page-modal" href="<?php print_link($md_pagelink) ?>">
                <i class="fa fa-eye"></i> <?php echo $data['shift'] ?>
            </a>
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
        <td class="td-pink">
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
        <td class="td-blue">
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
        <td class="td-domex">
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
        <td class="td-easywash">
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
        <td class="td-fg">
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
        <td class="td-batch_size">
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
        <td class="td-domexmt"> <?php echo $data['domexmt']; ?></td>
        <td class="td-wheelmt"> <?php echo $data['wheelmt']; ?></td>
        <td class="td-ewmt"> <?php echo $data['ewmt']; ?></td>
        <td class="td-total"> <?php echo $data['total']; ?></td>
        <td class="td-d20"> <?php echo $data['d20']; ?></td>
        <td class="td-d100"> <?php echo $data['d100']; ?></td>
        <td class="td-d250"> <?php echo $data['d250']; ?></td>
        <td class="td-d400"> <?php echo $data['d400']; ?></td>
        <td class="td-wh60"> <?php echo $data['wh60']; ?></td>
        <td class="td-wh150"> <?php echo $data['wh150']; ?></td>
        <td class="td-wh155"> <?php echo $data['wh155']; ?></td>
        <td class="td-wh400"> <?php echo $data['wh400']; ?></td>
        <td class="td-wh1000"> <?php echo $data['wh1000']; ?></td>
        <td class="td-wh2000"> <?php echo $data['wh2000']; ?></td>
        <td class="td-ew90"> <?php echo $data['ew90']; ?></td>
        <td class="td-ew100"> <?php echo $data['ew100']; ?></td>
        <td class="td-ew500"> <?php echo $data['ew500']; ?></td>
        <td class="td-ew1000"> <?php echo $data['ew1000']; ?></td>
        <th class="td-btn">
            <?php if($can_view){ ?>
            <a class="btn btn-sm btn-success has-tooltip page-modal" title="View Record" href="<?php print_link("process/view/$rec_id"); ?>">
                <i class="fa fa-eye"></i> View
            </a>
            <?php } ?>
            <?php if($can_edit){ ?>
            <a class="btn btn-sm btn-info has-tooltip page-modal" title="Edit This Record" href="<?php print_link("process/edit/$rec_id"); ?>">
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
    <?php
    } else {
    ?>
    <td class="no-record-found col-12" colspan="100">
        <h4 class="text-muted text-center ">
            No Record Found
        </h4>
    </td>
    <?php
    }
    ?>
    