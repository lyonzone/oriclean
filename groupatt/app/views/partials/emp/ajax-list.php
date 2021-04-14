<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("emp/add");
$can_edit = ACL::is_allowed("emp/edit");
$can_view = ACL::is_allowed("emp/view");
$can_delete = ACL::is_allowed("emp/delete");
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
        <td class="td-gr">
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
        <td class="td-shift">
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
        <td class="td-shift_inch1">
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
        <td class="td-shift_inch2">
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
        <td class="td-gr_leader">
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
        <td class="td-ghk">
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
        <th class="td-btn">
            <?php if($can_view){ ?>
            <a class="btn btn-sm btn-success has-tooltip page-modal" title="View Record" href="<?php print_link("emp/view/$rec_id"); ?>">
                <i class="fa fa-eye"></i> View
            </a>
            <?php } ?>
            <?php if($can_edit){ ?>
            <a class="btn btn-sm btn-info has-tooltip page-modal" title="Edit This Record" href="<?php print_link("emp/edit/$rec_id"); ?>">
                <i class="fa fa-edit"></i> Edit
            </a>
            <?php } ?>
            <?php if($can_delete){ ?>
            <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("emp/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
    