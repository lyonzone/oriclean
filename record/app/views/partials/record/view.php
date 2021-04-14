
<?php 
//check if current user role is allowed access to the pages
$can_add = PageAccessManager::is_allowed('record/add');
$can_edit = PageAccessManager::is_allowed('record/edit');
$can_view = PageAccessManager::is_allowed('record/view');
$can_delete = PageAccessManager::is_allowed('record/delete');
?>

<?php
$comp_model = new SharedController;
$current_page = get_current_url();
$csrf_token = Csrf :: $token;

//Page Data Information from Controller
$data = $this->view_data;

//$rec_id = $data['__tableprimarykey'];
$page_id = Router::$page_id; //Page id from url

$view_title = $this->view_title;

$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;

?>

<section class="page">
    
    <?php
    if( $show_header == true ){
    ?>
    
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            
            <div class="row ">
                
                <div class="col-12 ">
                    <h3 class="record-title">View  Record</h3>
                    
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
                    
                    <div  class=" animated fadeIn">
                        <?php
                        
                        $counter = 0;
                        if(!empty($data)){
                        $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                        
                        
                        
                        $counter++;
                        ?>
                        <div class="page-records ">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody>
                                    
                                    <tr>
                                        <th class="title"> Id :</th>
                                        <td class="value"> <?php echo $data['id']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Record Name :</th>
                                        <td class="value"> <?php echo $data['record_name']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Financial Year :</th>
                                        <td class="value"> <?php echo $data['financial_year']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Month :</th>
                                        <td class="value"> <?php echo $data['month']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Shelf No :</th>
                                        <td class="value"> <?php echo $data['shelf_no']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Part :</th>
                                        <td class="value"> <?php echo $data['part']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Rack No :</th>
                                        <td class="value"> <?php echo $data['rack_no']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Page No :</th>
                                        <td class="value"> <?php echo $data['page_no']; ?> </td>
                                    </tr>
                                    
                                    
                                </tbody>
                                <!-- Table Body End -->
                                <tfoot>
                                    <tr>
                                        
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="p-3">
                            
                            
                            <?php if($can_edit){ ?>
                            
                            <a class="btn btn-sm btn-info"  href="<?php print_link("record/edit/$rec_id"); ?>">
                                <i class="fa fa-edit"></i> 
                            </a>
                            
                            <?php } ?>
                            
                            
                            <?php if($can_delete){ ?>
                            
                            <a class="btn btn-sm btn-danger record-delete-btn"  href="<?php print_link("record/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="" data-display-style="none">
                                <i class="fa fa-times"></i> 
                            </a>
                            
                            <?php } ?>
                            
                            
                            <button class="btn btn-sm btn-primary export-btn">
                                <i class="fa fa-save"></i> 
                            </button>
                            
                            
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
