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
                    <h4 class="record-title">View  Process</h4>
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
                </div>
                <div class="col-sm-2 comp-grid">
                    <div class=""><div><tr  class="td-id">
                        <th class="title"> Id: </th>
                        <td class="value"> <?php echo $data['id']; ?></td>
                    </tr></div>
                </div>
            </div>
            <div class="col-sm-2 comp-grid">
                <div class=""><div><div><tr  class="td-shift">
                    <th class="title"> Shift: </th>
                    <td class="value"> <?php echo $data['shift']; ?></td>
                </tr></div></div>
            </div>
        </div>
        <div class="col-sm-2 comp-grid">
            <div class=""><div><div><tr  class="td-domexmt">
                <th class="title"> DOMEX MT: </th>
                <td class="value"> <?php echo $data['td-domexmt']; ?></td>
            </tr></div></div>
        </div>
    </div>
    <div class="col-md-6 comp-grid">
        <div class=""><div class="dropup export-btn-holder mx-1">
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
                            </div></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
