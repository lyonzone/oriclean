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
                    <h4 class="record-title">Add New Qc</h4>
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
                        <form id="qc-add-form"  novalidate role="form" enctype="multipart/form-data" class="form multi-form page-form" action="<?php print_link("qc/add?csrf_token=$csrf_token") ?>" method="post" >
                            <div>
                                <table class="table table-striped table-sm" data-maxrow="10" data-minrow="1">
                                    <thead>
                                        <tr>
                                            <th class="bg-light"><label for="qc_incharge">Qc Incharge</label></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        for( $row = 1; $row <= 1; $row++ ){
                                        ?>
                                        <tr class="input-row">
                                            <td>
                                                <div id="ctrl-qc_incharge-row<?php echo $row; ?>-holder" class="">
                                                    <input id="ctrl-qc_incharge-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('qc_incharge',"", $row); ?>" type="text" placeholder="Enter Qc Incharge" list="qc_incharge_list"  required="" name="row<?php echo $row ?>[qc_incharge]"  class="form-control " />
                                                        <datalist id="qc_incharge_list">
                                                            <?php 
                                                            $qc_incharge_options = $comp_model -> qc_qc_incharge_option_list();
                                                            if(!empty($qc_incharge_options)){
                                                            foreach($qc_incharge_options as $option){
                                                            $value = (!empty($option['value']) ? $option['value'] : null);
                                                            $label = (!empty($option['label']) ? $option['label'] : $value);
                                                            ?>
                                                            <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
                                                            <?php
                                                            }
                                                            }
                                                            ?>
                                                        </datalist>
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
                                        <div id="ctrl-qc_incharge-row<?php echo $row; ?>-holder" class="">
                                            <input id="ctrl-qc_incharge-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('qc_incharge',"", $row); ?>" type="text" placeholder="Enter Qc Incharge" list="qc_incharge_list"  required="" name="row<?php echo $row ?>[qc_incharge]"  class="form-control " />
                                                <datalist id="qc_incharge_list">
                                                    <?php 
                                                    $qc_incharge_options = $comp_model -> qc_qc_incharge_option_list();
                                                    if(!empty($qc_incharge_options)){
                                                    foreach($qc_incharge_options as $option){
                                                    $value = (!empty($option['value']) ? $option['value'] : null);
                                                    $label = (!empty($option['label']) ? $option['label'] : $value);
                                                    ?>
                                                    <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
                                                    <?php
                                                    }
                                                    }
                                                    ?>
                                                </datalist>
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
