<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("wastagelogs/add");
$can_edit = ACL::is_allowed("wastagelogs/edit");
$can_view = ACL::is_allowed("wastagelogs/view");
$can_delete = ACL::is_allowed("wastagelogs/delete");
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
        <td class="td-date">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['date']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("wastagelogs/editfield/" . urlencode($data['id'])); ?>" 
                data-name="date" 
                data-title="Enter Date" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['date']; ?> 
            </span>
        </td>
        <td class="td-shift">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['shift']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("wastagelogs/editfield/" . urlencode($data['id'])); ?>" 
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
        <td class="td-grp">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['grp']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("wastagelogs/editfield/" . urlencode($data['id'])); ?>" 
                data-name="grp" 
                data-title="Enter Group" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['grp']; ?> 
            </span>
        </td>
        <td class="td-mcn">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['mcn']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("wastagelogs/editfield/" . urlencode($data['id'])); ?>" 
                data-name="mcn" 
                data-title="Enter Machine No" 
                data-placement="left" 
                data-toggle="click" 
                data-type="number" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['mcn']; ?> 
            </span>
        </td>
        <td class="td-pouches">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['pouches']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("wastagelogs/editfield/" . urlencode($data['id'])); ?>" 
                data-name="pouches" 
                data-title="Enter Pouches" 
                data-placement="left" 
                data-toggle="click" 
                data-type="number" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['pouches']; ?> 
            </span>
        </td>
        <td class="td-trial">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['trial']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("wastagelogs/editfield/" . urlencode($data['id'])); ?>" 
                data-name="trial" 
                data-title="Enter Trial Wastage (in KG)" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['trial']; ?> 
            </span>
        </td>
        <td class="td-leaker">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['leaker']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("wastagelogs/editfield/" . urlencode($data['id'])); ?>" 
                data-name="leaker" 
                data-title="Enter Leaker Wastage (in KG)" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['leaker']; ?> 
            </span>
        </td>
        <td class="td-damage">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['damage']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("wastagelogs/editfield/" . urlencode($data['id'])); ?>" 
                data-name="damage" 
                data-title="Enter Damage Wastage (in KG)" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['damage']; ?> 
            </span>
        </td>
        <td class="td-powder_wast">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['powder_wast']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("wastagelogs/editfield/" . urlencode($data['id'])); ?>" 
                data-name="powder_wast" 
                data-title="Enter Powder Wastage" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['powder_wast']; ?> 
            </span>
        </td>
        <td class="td-remark">
            <span <?php if($can_edit){ ?> data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("wastagelogs/editfield/" . urlencode($data['id'])); ?>" 
                data-name="remark" 
                data-title="Enter Remark" 
                data-placement="left" 
                data-toggle="click" 
                data-type="textarea" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['remark']; ?> 
            </span>
        </td>
        <th class="td-btn">
            <?php if($can_view){ ?>
            <a class="btn btn-sm btn-success has-tooltip page-modal" title="View Record" href="<?php print_link("wastagelogs/view/$rec_id"); ?>">
                <i class="fa fa-eye"></i> View
            </a>
            <?php } ?>
            <?php if($can_edit){ ?>
            <a class="btn btn-sm btn-info has-tooltip page-modal" title="Edit This Record" href="<?php print_link("wastagelogs/edit/$rec_id"); ?>">
                <i class="fa fa-edit"></i> Edit
            </a>
            <?php } ?>
            <?php if($can_delete){ ?>
            <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("wastagelogs/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
    