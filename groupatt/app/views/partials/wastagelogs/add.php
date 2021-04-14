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
                    <h4 class="record-title">Add New Wastagelogs</h4>
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
                        <form id="wastagelogs-add-form"  novalidate role="form" enctype="multipart/form-data" class="form multi-form page-form" action="<?php print_link("wastagelogs/add?csrf_token=$csrf_token") ?>" method="post" >
                            <div>
                                <table class="table table-striped table-sm" data-maxrow="10" data-minrow="1">
                                    <thead>
                                        <tr>
                                            <th class="bg-light"><label for="date">Date</label></th>
                                            <th class="bg-light"><label for="shift">Shift</label></th>
                                            <th class="bg-light"><label for="grp">Group</label></th>
                                            <th class="bg-light"><label for="mcn">Machine No</label></th>
                                            <th class="bg-light"><label for="pouches">Pouches</label></th>
                                            <th class="bg-light"><label for="trial">Trial Wastage (in KG)</label></th>
                                            <th class="bg-light"><label for="leaker">Leaker Wastage (in KG)</label></th>
                                            <th class="bg-light"><label for="damage">Damage Wastage (in KG)</label></th>
                                            <th class="bg-light"><label for="powder_wast">Powder Wastage</label></th>
                                            <th class="bg-light"><label for="remark">Remark</label></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        for( $row = 1; $row <= 1; $row++ ){
                                        ?>
                                        <tr class="input-row">
                                            <td>
                                                <div id="ctrl-date-row<?php echo $row; ?>-holder" class="input-group">
                                                    <input id="ctrl-date-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('date',"", $row); ?>" type="text" placeholder="Enter Date"  required="" name="row<?php echo $row ?>[date]"  class="form-control " />
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div id="ctrl-shift-row<?php echo $row; ?>-holder" class="">
                                                        <input id="ctrl-shift-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('shift',"", $row); ?>" type="text" placeholder="Enter Shift"  required="" name="row<?php echo $row ?>[shift]"  class="form-control " />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div id="ctrl-grp-row<?php echo $row; ?>-holder" class="">
                                                            <input id="ctrl-grp-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('grp',"", $row); ?>" type="text" placeholder="Enter Group"  required="" name="row<?php echo $row ?>[grp]"  class="form-control " />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div id="ctrl-mcn-row<?php echo $row; ?>-holder" class="">
                                                                <input id="ctrl-mcn-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('mcn',"", $row); ?>" type="number" placeholder="Enter Machine No" step="1"  required="" name="row<?php echo $row ?>[mcn]"  class="form-control " />
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="ctrl-pouches-row<?php echo $row; ?>-holder" class="">
                                                                    <input id="ctrl-pouches-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('pouches',"", $row); ?>" type="number" placeholder="Enter Pouches" step="1"  required="" name="row<?php echo $row ?>[pouches]"  class="form-control " />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div id="ctrl-trial-row<?php echo $row; ?>-holder" class="">
                                                                        <input id="ctrl-trial-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('trial',"", $row); ?>" type="text" placeholder="Enter Trial Wastage (in KG)"  required="" name="row<?php echo $row ?>[trial]"  class="form-control " />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div id="ctrl-leaker-row<?php echo $row; ?>-holder" class="">
                                                                            <input id="ctrl-leaker-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('leaker',"", $row); ?>" type="text" placeholder="Enter Leaker Wastage (in KG)"  required="" name="row<?php echo $row ?>[leaker]"  class="form-control " />
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="ctrl-damage-row<?php echo $row; ?>-holder" class="">
                                                                                <input id="ctrl-damage-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('damage',"", $row); ?>" type="text" placeholder="Enter Damage Wastage (in KG)"  required="" name="row<?php echo $row ?>[damage]"  class="form-control " />
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div id="ctrl-powder_wast-row<?php echo $row; ?>-holder" class="">
                                                                                    <input id="ctrl-powder_wast-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('powder_wast',"", $row); ?>" type="text" placeholder="Enter Powder Wastage"  required="" name="row<?php echo $row ?>[powder_wast]"  class="form-control " />
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div id="ctrl-remark-row<?php echo $row; ?>-holder" class="">
                                                                                        <textarea placeholder="Enter Remark" id="ctrl-remark-row<?php echo $row; ?>"  required="" rows="5" name="row<?php echo $row ?>[remark]" class=" form-control"><?php  echo $this->set_field_value('remark',"", $row); ?></textarea>
                                                                                        <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                                                                    </div>
                                                                                </td>
                                                                                <th class="text-center">
                                                                                    <button type="button" class="close btn-remove-table-row">&times;</button>
                                                                                </th>
                                                                            </tr>
                                                                            <?php 
                                                                            }
                                                                            ?>
                                                                        </tbody>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <th colspan="100" class="text-right">
                                                                                    <?php $template_id = "table-row-" . random_str(); ?>
                                                                                    <button type="button" data-template="#<?php echo $template_id ?>" class="btn btn-sm btn-light btn-add-table-row"><i class="fa fa-plus"></i></button>
                                                                                </th>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                                <div class="form-group form-submit-btn-holder text-center mt-3">
                                                                    <div class="form-ajax-status"></div>
                                                                    <button class="btn btn-primary" type="submit">
                                                                        Submit
                                                                        <i class="fa fa-send"></i>
                                                                    </button>
                                                                </div>
                                                            </form>
                                                            <!--[table row template]-->
                                                            <template id="<?php echo $template_id ?>">
                                                                <tr class="input-row">
                                                                    <?php $row = 1; ?>
                                                                    <td>
                                                                        <div id="ctrl-date-row<?php echo $row; ?>-holder" class="input-group">
                                                                            <input id="ctrl-date-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('date',"", $row); ?>" type="text" placeholder="Enter Date"  required="" name="row<?php echo $row ?>[date]"  class="form-control " />
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="ctrl-shift-row<?php echo $row; ?>-holder" class="">
                                                                                <input id="ctrl-shift-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('shift',"", $row); ?>" type="text" placeholder="Enter Shift"  required="" name="row<?php echo $row ?>[shift]"  class="form-control " />
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div id="ctrl-grp-row<?php echo $row; ?>-holder" class="">
                                                                                    <input id="ctrl-grp-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('grp',"", $row); ?>" type="text" placeholder="Enter Group"  required="" name="row<?php echo $row ?>[grp]"  class="form-control " />
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div id="ctrl-mcn-row<?php echo $row; ?>-holder" class="">
                                                                                        <input id="ctrl-mcn-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('mcn',"", $row); ?>" type="number" placeholder="Enter Machine No" step="1"  required="" name="row<?php echo $row ?>[mcn]"  class="form-control " />
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div id="ctrl-pouches-row<?php echo $row; ?>-holder" class="">
                                                                                            <input id="ctrl-pouches-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('pouches',"", $row); ?>" type="number" placeholder="Enter Pouches" step="1"  required="" name="row<?php echo $row ?>[pouches]"  class="form-control " />
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div id="ctrl-trial-row<?php echo $row; ?>-holder" class="">
                                                                                                <input id="ctrl-trial-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('trial',"", $row); ?>" type="text" placeholder="Enter Trial Wastage (in KG)"  required="" name="row<?php echo $row ?>[trial]"  class="form-control " />
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div id="ctrl-leaker-row<?php echo $row; ?>-holder" class="">
                                                                                                    <input id="ctrl-leaker-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('leaker',"", $row); ?>" type="text" placeholder="Enter Leaker Wastage (in KG)"  required="" name="row<?php echo $row ?>[leaker]"  class="form-control " />
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <div id="ctrl-damage-row<?php echo $row; ?>-holder" class="">
                                                                                                        <input id="ctrl-damage-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('damage',"", $row); ?>" type="text" placeholder="Enter Damage Wastage (in KG)"  required="" name="row<?php echo $row ?>[damage]"  class="form-control " />
                                                                                                        </div>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <div id="ctrl-powder_wast-row<?php echo $row; ?>-holder" class="">
                                                                                                            <input id="ctrl-powder_wast-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('powder_wast',"", $row); ?>" type="text" placeholder="Enter Powder Wastage"  required="" name="row<?php echo $row ?>[powder_wast]"  class="form-control " />
                                                                                                            </div>
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <div id="ctrl-remark-row<?php echo $row; ?>-holder" class="">
                                                                                                                <textarea placeholder="Enter Remark" id="ctrl-remark-row<?php echo $row; ?>"  required="" rows="5" name="row<?php echo $row ?>[remark]" class=" form-control"><?php  echo $this->set_field_value('remark',"", $row); ?></textarea>
                                                                                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                                                                                            </div>
                                                                                                        </td>
                                                                                                        <th class="text-center">
                                                                                                            <button type="button" class="close btn-remove-table-row">&times;</button>
                                                                                                        </th>
                                                                                                    </tr>
                                                                                                </template>
                                                                                                <!--[/table row template]-->
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </section>
