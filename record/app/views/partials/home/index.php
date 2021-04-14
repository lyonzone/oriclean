
<?php 
$page_id = null;
$comp_model = new SharedController;
$current_page = get_current_url();
?>
<div>
    
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            
            <div class="row ">
                
                <div class="col-md-12 comp-grid">
                    <h3 >The Dashboard</h3>
                    
                </div>
                
                <div class="col-md-3 col-sm-4 comp-grid">
                    
                    <?php $rec_count = $comp_model->getcount_record();  ?>
                    <a class="animated zoomIn record-count card bg-light text-dark"  href="<?php print_link("record/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-globe"></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Record</div>
                                    
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                        
                    </a>
                    
                </div>
                
            </div>
        </div>
    </div>
    
</div>
