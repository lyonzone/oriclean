<?php 
/**
 * Emp Page Controller
 * @category  Controller
 */
class EmpController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "emp";
	}
	/**
     * List page records
     * @param $fieldname (filter record by a field) 
     * @param $fieldvalue (filter field value)
     * @return BaseView
     */
	function index($fieldname = null , $fieldvalue = null){
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$fields = array("id", 
			"date", 
			"gr", 
			"shift", 
			"shift_inch1", 
			"shift_inch2", 
			"gr_leader", 
			"ghk");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				emp.id LIKE ? OR 
				emp.date LIKE ? OR 
				emp.gr LIKE ? OR 
				emp.shift LIKE ? OR 
				emp.shift_inch1 LIKE ? OR 
				emp.shift_inch2 LIKE ? OR 
				emp.gr_leader LIKE ? OR 
				emp.ghk LIKE ? OR 
				emp.online_checker1 LIKE ? OR 
				emp.online_checker2 LIKE ? OR 
				emp.online_checker3 LIKE ? OR 
				emp.fitter LIKE ? OR 
				emp.dmx_feeding LIKE ? OR 
				emp.dmx_bagger LIKE ? OR 
				emp.dmx_hasia LIKE ? OR 
				emp.dmx_subham LIKE ? OR 
				emp.dmx_sigma LIKE ? OR 
				emp.ew_boone LIKE ? OR 
				emp.ew_bosch LIKE ? OR 
				emp.ew_feeding LIKE ? OR 
				emp.ew_subham LIKE ? OR 
				emp.ew_bagger LIKE ? OR 
				emp.shift_elect1 LIKE ? OR 
				emp.qc1 LIKE ? OR 
				emp.qc2 LIKE ? OR 
				emp.shift_elect2 LIKE ? OR 
				emp.minor1 LIKE ? OR 
				emp.minor2 LIKE ? OR 
				emp.minor3 LIKE ? OR 
				emp.minor5 LIKE ? OR 
				emp.minor6 LIKE ? OR 
				emp.minor7 LIKE ? OR 
				emp.minor8 LIKE ? OR 
				emp.forklift1 LIKE ? OR 
				emp.forklift2 LIKE ? OR 
				emp.forklift3 LIKE ? OR 
				emp.wl_feeding1 LIKE ? OR 
				emp.wl_feeding2 LIKE ? OR 
				emp.wl_feeding3 LIKE ? OR 
				emp.wl_feeding4 LIKE ? OR 
				emp.wl_feeding5 LIKE ? OR 
				emp.wl_feeding6 LIKE ? OR 
				emp.wl_feeding7 LIKE ? OR 
				emp.wl_feeding8 LIKE ? OR 
				emp.wl_8mtr1 LIKE ? OR 
				emp.wl_11mtr1 LIKE ? OR 
				emp.wl_psm1 LIKE ? OR 
				emp.wl_psm2 LIKE ? OR 
				emp.wl_8mtr2 LIKE ? OR 
				emp.wl_11mtr2 LIKE ? OR 
				emp.wl_mico2 LIKE ? OR 
				emp.wl_mico3 LIKE ? OR 
				emp.wl_mico4 LIKE ? OR 
				emp.wl_mico5 LIKE ? OR 
				emp.wl_mico6 LIKE ? OR 
				emp.wl_subham2 LIKE ? OR 
				emp.wl_subham3 LIKE ? OR 
				emp.wl_subham4 LIKE ? OR 
				emp.wl_subham1 LIKE ? OR 
				emp.wl_mico1 LIKE ? OR 
				emp.wl_bagger4 LIKE ? OR 
				emp.wl_bagger2 LIKE ? OR 
				emp.wl_bagger3 LIKE ? OR 
				emp.wl_ws4 LIKE ? OR 
				emp.wl_ws3 LIKE ? OR 
				emp.wl_ws2 LIKE ? OR 
				emp.wl_ws1 LIKE ? OR 
				emp.wl_stacking1 LIKE ? OR 
				emp.wl_stacking2 LIKE ? OR 
				emp.wl_stacking3 LIKE ? OR 
				emp.wl_stacking4 LIKE ? OR 
				emp.wl_stacking5 LIKE ? OR 
				emp.wl_stacking6 LIKE ? OR 
				emp.dmx_sigma1 LIKE ? OR 
				emp.dmx_subham1 LIKE ? OR 
				emp.dmx_subham2 LIKE ? OR 
				emp.dmx_hasia1 LIKE ? OR 
				emp.dmx_bagger1 LIKE ? OR 
				emp.dmx_ws1 LIKE ? OR 
				emp.dmx_stacking1 LIKE ? OR 
				emp.ew_feeding1 LIKE ? OR 
				emp.ew_boone1 LIKE ? OR 
				emp.ew_fg1 LIKE ? OR 
				emp.ew_fg2 LIKE ? OR 
				emp.ew_fg3 LIKE ? OR 
				emp.ew_fg4 LIKE ? OR 
				emp.ew_fg6 LIKE ? OR 
				emp.ew_fg7 LIKE ? OR 
				emp.ew_subham1 LIKE ? OR 
				emp.ew_subham2 LIKE ? OR 
				emp.ew_subham3 LIKE ? OR 
				emp.ew_subham4 LIKE ? OR 
				emp.ew_subham5 LIKE ? OR 
				emp.ew_subham6 LIKE ? OR 
				emp.ew_subham7 LIKE ? OR 
				emp.ew_bagger1 LIKE ? OR 
				emp.ew_bagger2 LIKE ? OR 
				emp.ew_bagger3 LIKE ? OR 
				emp.ew_bagger4 LIKE ? OR 
				emp.ew_bagger5 LIKE ? OR 
				emp.ew_bagger6 LIKE ? OR 
				emp.ew_bagger7 LIKE ? OR 
				emp.ew_stacking2 LIKE ? OR 
				emp.ew_stacking3 LIKE ? OR 
				emp.ew_stacking4 LIKE ? OR 
				emp.ew_stacking5 LIKE ? OR 
				emp.ew_stacking6 LIKE ? OR 
				emp.ew_stacking7 LIKE ? OR 
				emp.ew_stacking8 LIKE ? OR 
				emp.ew_stacking9 LIKE ? OR 
				emp.ew_ws1 LIKE ? OR 
				emp.ew_ws2 LIKE ? OR 
				emp.ew_ws3 LIKE ? OR 
				emp.ew_ws4 LIKE ? OR 
				emp.ew_big1 LIKE ? OR 
				emp.ew_big3 LIKE ? OR 
				emp.ew_big4 LIKE ? OR 
				emp.ew_big2 LIKE ? OR 
				emp.minor4 LIKE ? OR 
				emp.wl_bagger1 LIKE ? OR 
				emp.dmx_feeding1 LIKE ? OR 
				emp.dmx_stacking2 LIKE ? OR 
				emp.dmx_ws2 LIKE ? OR 
				emp.ew_bosch1 LIKE ? OR 
				emp.ew_bosch2 LIKE ? OR 
				emp.ew_stacking1 LIKE ? OR 
				emp.ew_stacking10 LIKE ? OR 
				emp.olc LIKE ? OR 
				emp.warehouse LIKE ? OR 
				emp.bag_coding LIKE ? OR 
				emp.store_incharge LIKE ? OR 
				emp.wt_variation_checker LIKE ? OR 
				emp.wl_bagger6 LIKE ? OR 
				emp.wl_ws6 LIKE ? OR 
				emp.wl_bagger5 LIKE ? OR 
				emp.wl_ws5 LIKE ? OR 
				emp.wl_subhambagger4t LIKE ? OR 
				emp.wl_subhambagger5t LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "emp/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("emp.id", ORDER_TYPE);
		}
		if($fieldname){
			$db->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$tc = $db->withTotalCount();
		$records = $db->get($tablename, $pagination, $fields);
		$records_count = count($records);
		$total_records = intval($tc->totalCount);
		$page_limit = $pagination[1];
		$total_pages = ceil($total_records / $page_limit);
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = $records_count;
		$data->total_records = $total_records;
		$data->total_page = $total_pages;
		if($db->getLastError()){
			$this->set_page_error();
		}
		$page_title = $this->view->page_title = "Emp";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$view_name = (is_ajax() ? "emp/ajax-list.php" : "emp/list.php");
		$this->render_view($view_name, $data);
	}
	/**
     * View record detail 
	 * @param $rec_id (select record by table primary key) 
     * @param $value value (select record by value of field name(rec_id))
     * @return BaseView
     */
	function view($rec_id = null, $value = null){
		$request = $this->request;
		$db = $this->GetModel();
		$rec_id = $this->rec_id = urldecode($rec_id);
		$tablename = $this->tablename;
		$fields = array("id", 
			"date", 
			"gr", 
			"shift_inch1", 
			"shift_inch2", 
			"gr_leader", 
			"shift", 
			"ghk", 
			"online_checker1", 
			"online_checker2", 
			"online_checker3", 
			"fitter", 
			"dmx_feeding", 
			"dmx_bagger", 
			"dmx_hasia", 
			"dmx_subham", 
			"dmx_sigma", 
			"ew_boone", 
			"ew_bosch", 
			"ew_feeding", 
			"ew_subham", 
			"ew_bagger", 
			"shift_elect1", 
			"qc1", 
			"qc2", 
			"shift_elect2", 
			"minor1", 
			"minor2", 
			"minor3", 
			"minor5", 
			"minor6", 
			"minor7", 
			"minor8", 
			"forklift1", 
			"forklift2", 
			"forklift3", 
			"wl_feeding1", 
			"wl_feeding2", 
			"wl_feeding3", 
			"wl_feeding4", 
			"wl_feeding5", 
			"wl_feeding6", 
			"wl_feeding7", 
			"wl_feeding8", 
			"wl_8mtr1", 
			"wl_11mtr1", 
			"wl_psm1", 
			"wl_psm2", 
			"wl_8mtr2", 
			"wl_11mtr2", 
			"wl_mico2", 
			"wl_mico3", 
			"wl_mico4", 
			"wl_mico5", 
			"wl_mico6", 
			"wl_subham2", 
			"wl_subham3", 
			"wl_subham4", 
			"wl_subham1", 
			"wl_mico1", 
			"wl_bagger4", 
			"wl_bagger2", 
			"wl_bagger3", 
			"wl_ws4", 
			"wl_ws3", 
			"wl_ws2", 
			"wl_ws1", 
			"wl_stacking1", 
			"wl_stacking2", 
			"wl_stacking3", 
			"wl_stacking4", 
			"wl_stacking5", 
			"wl_stacking6", 
			"dmx_sigma1", 
			"dmx_subham1", 
			"dmx_subham2", 
			"dmx_hasia1", 
			"dmx_bagger1", 
			"dmx_ws1", 
			"dmx_stacking1", 
			"ew_feeding1", 
			"ew_boone1", 
			"ew_fg1", 
			"ew_fg2", 
			"ew_fg3", 
			"ew_fg4", 
			"ew_fg6", 
			"ew_fg7", 
			"ew_subham1", 
			"ew_subham2", 
			"ew_subham3", 
			"ew_subham4", 
			"ew_subham5", 
			"ew_subham6", 
			"ew_subham7", 
			"ew_bagger1", 
			"ew_bagger2", 
			"ew_bagger3", 
			"ew_bagger4", 
			"ew_bagger5", 
			"ew_bagger6", 
			"ew_bagger7", 
			"ew_stacking2", 
			"ew_stacking3", 
			"ew_stacking4", 
			"ew_stacking5", 
			"ew_stacking6", 
			"ew_stacking7", 
			"ew_stacking8", 
			"ew_stacking9", 
			"ew_ws1", 
			"ew_ws2", 
			"ew_ws3", 
			"ew_ws4", 
			"ew_big1", 
			"ew_big3", 
			"ew_big4", 
			"ew_big2", 
			"minor4", 
			"wl_bagger1", 
			"dmx_feeding1", 
			"dmx_stacking2", 
			"dmx_ws2", 
			"ew_bosch1", 
			"ew_bosch2", 
			"ew_stacking1", 
			"ew_stacking10", 
			"olc", 
			"warehouse", 
			"bag_coding", 
			"store_incharge", 
			"wt_variation_checker", 
			"wl_bagger6", 
			"wl_ws6", 
			"wl_bagger5", 
			"wl_ws5", 
			"wl_subhambagger4t", 
			"wl_subhambagger5t");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("emp.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  Emp";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		}
		else{
			if($db->getLastError()){
				$this->set_page_error();
			}
			else{
				$this->set_page_error("No record found");
			}
		}
		return $this->render_view("emp/view.php", $record);
	}
	/**
     * Insert new record to the database table
	 * @param $formdata array() from $_POST
     * @return BaseView
     */
	function add($formdata = null){
		if($formdata){
			$db = $this->GetModel();
			$tablename = $this->tablename;
			$request = $this->request;
			//fillable fields
			$fields = $this->fields = array("date","gr","shift","shift_inch1","shift_inch2","gr_leader","ghk","qc1","qc2","online_checker1","online_checker2","online_checker3","fitter","shift_elect1","shift_elect2","olc","warehouse","bag_coding","store_incharge","wt_variation_checker","minor1","minor2","minor3","minor4","minor5","minor6","minor7","minor8","forklift1","forklift2","forklift3","wl_feeding1","wl_feeding2","wl_feeding3","wl_feeding4","wl_feeding5","wl_feeding6","wl_feeding7","wl_feeding8","wl_psm1","wl_psm2","wl_8mtr1","wl_8mtr2","wl_11mtr1","wl_11mtr2","wl_mico1","wl_mico2","wl_mico3","wl_mico4","wl_mico5","wl_mico6","wl_subham1","wl_subham2","wl_subham3","wl_subham4","wl_subhambagger4t","wl_subhambagger5t","wl_bagger1","wl_bagger2","wl_bagger3","wl_bagger4","wl_bagger5","wl_bagger6","wl_ws1","wl_ws2","wl_ws3","wl_ws4","wl_ws5","wl_ws6","wl_stacking1","wl_stacking2","wl_stacking3","wl_stacking4","wl_stacking5","wl_stacking6","dmx_feeding","dmx_feeding1","dmx_sigma","dmx_sigma1","dmx_subham","dmx_subham1","dmx_subham2","dmx_hasia","dmx_hasia1","dmx_ws1","dmx_ws2","dmx_bagger","dmx_bagger1","dmx_stacking1","dmx_stacking2","ew_feeding","ew_feeding1","ew_boone","ew_boone1","ew_fg1","ew_fg2","ew_fg3","ew_fg4","ew_fg6","ew_fg7","ew_subham","ew_subham1","ew_subham2","ew_subham3","ew_subham4","ew_subham5","ew_subham6","ew_subham7","ew_bosch","ew_bosch1","ew_bosch2","ew_big1","ew_big2","ew_big3","ew_big4","ew_bagger1","ew_bagger2","ew_bagger","ew_bagger3","ew_bagger4","ew_bagger5","ew_bagger6","ew_bagger7","ew_ws1","ew_ws2","ew_ws3","ew_ws4","ew_stacking1","ew_stacking2","ew_stacking3","ew_stacking4","ew_stacking5","ew_stacking6","ew_stacking7","ew_stacking8","ew_stacking9","ew_stacking10");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'date' => 'required',
				'gr' => 'required',
				'shift' => 'required',
				'shift_inch1' => 'required',
				'gr_leader' => 'required',
				'ghk' => 'required',
				'qc1' => 'required',
				'online_checker1' => 'required',
				'fitter' => 'required',
				'shift_elect1' => 'required',
				'olc' => 'required',
				'warehouse' => 'required',
				'bag_coding' => 'required',
				'store_incharge' => 'required',
				'wt_variation_checker' => 'required',
				'minor1' => 'required',
				'forklift1' => 'required',
				'wl_feeding1' => 'required',
				'wl_psm1' => 'required',
				'wl_8mtr1' => 'required',
				'wl_11mtr1' => 'required',
				'wl_mico1' => 'required',
				'wl_subham1' => 'required',
				'wl_subhambagger4t' => 'required',
				'wl_subhambagger5t' => 'required',
				'wl_bagger1' => 'required',
				'wl_ws1' => 'required',
				'wl_stacking1' => 'required',
				'dmx_feeding' => 'required',
				'dmx_sigma' => 'required',
				'dmx_subham' => 'required',
				'dmx_hasia' => 'required',
				'dmx_ws1' => 'required',
				'dmx_bagger' => 'required',
				'dmx_stacking1' => 'required',
				'ew_feeding' => 'required',
				'ew_boone' => 'required',
				'ew_fg1' => 'required',
				'ew_subham' => 'required',
				'ew_bosch' => 'required',
				'ew_big1' => 'required',
				'ew_bagger1' => 'required',
				'ew_ws1' => 'required',
				'ew_stacking1' => 'required',
			);
			$this->sanitize_array = array(
				'date' => 'sanitize_string',
				'gr' => 'sanitize_string',
				'shift' => 'sanitize_string',
				'shift_inch1' => 'sanitize_string',
				'shift_inch2' => 'sanitize_string',
				'gr_leader' => 'sanitize_string',
				'ghk' => 'sanitize_string',
				'qc1' => 'sanitize_string',
				'qc2' => 'sanitize_string',
				'online_checker1' => 'sanitize_string',
				'online_checker2' => 'sanitize_string',
				'online_checker3' => 'sanitize_string',
				'fitter' => 'sanitize_string',
				'shift_elect1' => 'sanitize_string',
				'shift_elect2' => 'sanitize_string',
				'olc' => 'sanitize_string',
				'warehouse' => 'sanitize_string',
				'bag_coding' => 'sanitize_string',
				'store_incharge' => 'sanitize_string',
				'wt_variation_checker' => 'sanitize_string',
				'minor1' => 'sanitize_string',
				'minor2' => 'sanitize_string',
				'minor3' => 'sanitize_string',
				'minor4' => 'sanitize_string',
				'minor5' => 'sanitize_string',
				'minor6' => 'sanitize_string',
				'minor7' => 'sanitize_string',
				'minor8' => 'sanitize_string',
				'forklift1' => 'sanitize_string',
				'forklift2' => 'sanitize_string',
				'forklift3' => 'sanitize_string',
				'wl_feeding1' => 'sanitize_string',
				'wl_feeding2' => 'sanitize_string',
				'wl_feeding3' => 'sanitize_string',
				'wl_feeding4' => 'sanitize_string',
				'wl_feeding5' => 'sanitize_string',
				'wl_feeding6' => 'sanitize_string',
				'wl_feeding7' => 'sanitize_string',
				'wl_feeding8' => 'sanitize_string',
				'wl_psm1' => 'sanitize_string',
				'wl_psm2' => 'sanitize_string',
				'wl_8mtr1' => 'sanitize_string',
				'wl_8mtr2' => 'sanitize_string',
				'wl_11mtr1' => 'sanitize_string',
				'wl_11mtr2' => 'sanitize_string',
				'wl_mico1' => 'sanitize_string',
				'wl_mico2' => 'sanitize_string',
				'wl_mico3' => 'sanitize_string',
				'wl_mico4' => 'sanitize_string',
				'wl_mico5' => 'sanitize_string',
				'wl_mico6' => 'sanitize_string',
				'wl_subham1' => 'sanitize_string',
				'wl_subham2' => 'sanitize_string',
				'wl_subham3' => 'sanitize_string',
				'wl_subham4' => 'sanitize_string',
				'wl_subhambagger4t' => 'sanitize_string',
				'wl_subhambagger5t' => 'sanitize_string',
				'wl_bagger1' => 'sanitize_string',
				'wl_bagger2' => 'sanitize_string',
				'wl_bagger3' => 'sanitize_string',
				'wl_bagger4' => 'sanitize_string',
				'wl_bagger5' => 'sanitize_string',
				'wl_bagger6' => 'sanitize_string',
				'wl_ws1' => 'sanitize_string',
				'wl_ws2' => 'sanitize_string',
				'wl_ws3' => 'sanitize_string',
				'wl_ws4' => 'sanitize_string',
				'wl_ws5' => 'sanitize_string',
				'wl_ws6' => 'sanitize_string',
				'wl_stacking1' => 'sanitize_string',
				'wl_stacking2' => 'sanitize_string',
				'wl_stacking3' => 'sanitize_string',
				'wl_stacking4' => 'sanitize_string',
				'wl_stacking5' => 'sanitize_string',
				'wl_stacking6' => 'sanitize_string',
				'dmx_feeding' => 'sanitize_string',
				'dmx_feeding1' => 'sanitize_string',
				'dmx_sigma' => 'sanitize_string',
				'dmx_sigma1' => 'sanitize_string',
				'dmx_subham' => 'sanitize_string',
				'dmx_subham1' => 'sanitize_string',
				'dmx_subham2' => 'sanitize_string',
				'dmx_hasia' => 'sanitize_string',
				'dmx_hasia1' => 'sanitize_string',
				'dmx_ws1' => 'sanitize_string',
				'dmx_ws2' => 'sanitize_string',
				'dmx_bagger' => 'sanitize_string',
				'dmx_bagger1' => 'sanitize_string',
				'dmx_stacking1' => 'sanitize_string',
				'dmx_stacking2' => 'sanitize_string',
				'ew_feeding' => 'sanitize_string',
				'ew_feeding1' => 'sanitize_string',
				'ew_boone' => 'sanitize_string',
				'ew_boone1' => 'sanitize_string',
				'ew_fg1' => 'sanitize_string',
				'ew_fg2' => 'sanitize_string',
				'ew_fg3' => 'sanitize_string',
				'ew_fg4' => 'sanitize_string',
				'ew_fg6' => 'sanitize_string',
				'ew_fg7' => 'sanitize_string',
				'ew_subham' => 'sanitize_string',
				'ew_subham1' => 'sanitize_string',
				'ew_subham2' => 'sanitize_string',
				'ew_subham3' => 'sanitize_string',
				'ew_subham4' => 'sanitize_string',
				'ew_subham5' => 'sanitize_string',
				'ew_subham6' => 'sanitize_string',
				'ew_subham7' => 'sanitize_string',
				'ew_bosch' => 'sanitize_string',
				'ew_bosch1' => 'sanitize_string',
				'ew_bosch2' => 'sanitize_string',
				'ew_big1' => 'sanitize_string',
				'ew_big2' => 'sanitize_string',
				'ew_big3' => 'sanitize_string',
				'ew_big4' => 'sanitize_string',
				'ew_bagger1' => 'sanitize_string',
				'ew_bagger2' => 'sanitize_string',
				'ew_bagger' => 'sanitize_string',
				'ew_bagger3' => 'sanitize_string',
				'ew_bagger4' => 'sanitize_string',
				'ew_bagger5' => 'sanitize_string',
				'ew_bagger6' => 'sanitize_string',
				'ew_bagger7' => 'sanitize_string',
				'ew_ws1' => 'sanitize_string',
				'ew_ws2' => 'sanitize_string',
				'ew_ws3' => 'sanitize_string',
				'ew_ws4' => 'sanitize_string',
				'ew_stacking1' => 'sanitize_string',
				'ew_stacking2' => 'sanitize_string',
				'ew_stacking3' => 'sanitize_string',
				'ew_stacking4' => 'sanitize_string',
				'ew_stacking5' => 'sanitize_string',
				'ew_stacking6' => 'sanitize_string',
				'ew_stacking7' => 'sanitize_string',
				'ew_stacking8' => 'sanitize_string',
				'ew_stacking9' => 'sanitize_string',
				'ew_stacking10' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("emp");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Group Attendance";
		$this->render_view("emp/add.php");
	}
	/**
     * Update table record with formdata
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function edit($rec_id = null, $formdata = null){
		$request = $this->request;
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		 //editable fields
		$fields = $this->fields = array("id","date","gr","shift","shift_inch1","shift_inch2","gr_leader","ghk","qc1","qc2","online_checker1","online_checker2","online_checker3","fitter","shift_elect1","shift_elect2","olc","warehouse","bag_coding","store_incharge","wt_variation_checker","minor1","minor2","minor3","minor4","minor5","minor6","minor7","minor8","forklift1","forklift2","forklift3","wl_feeding1","wl_feeding2","wl_feeding3","wl_feeding4","wl_feeding5","wl_feeding6","wl_feeding7","wl_feeding8","wl_psm1","wl_psm2","wl_8mtr1","wl_8mtr2","wl_11mtr1","wl_11mtr2","wl_mico1","wl_mico2","wl_mico3","wl_mico4","wl_mico5","wl_mico6","wl_subham1","wl_subham2","wl_subham3","wl_subham4","wl_subhambagger4t","wl_subhambagger5t","wl_bagger1","wl_bagger2","wl_bagger3","wl_bagger4","wl_bagger5","wl_bagger6","wl_ws1","wl_ws2","wl_ws3","wl_ws4","wl_ws5","wl_ws6","wl_stacking1","wl_stacking2","wl_stacking3","wl_stacking4","wl_stacking5","wl_stacking6","dmx_feeding","dmx_feeding1","dmx_sigma","dmx_sigma1","dmx_subham","dmx_subham1","dmx_subham2","dmx_hasia","dmx_hasia1","dmx_ws1","dmx_ws2","dmx_bagger","dmx_bagger1","dmx_stacking1","dmx_stacking2","ew_feeding","ew_feeding1","ew_boone","ew_boone1","ew_fg1","ew_fg2","ew_fg3","ew_fg4","ew_fg6","ew_fg7","ew_subham","ew_subham1","ew_subham2","ew_subham3","ew_subham4","ew_subham5","ew_subham6","ew_subham7","ew_bosch","ew_bosch1","ew_bosch2","ew_big1","ew_big2","ew_big3","ew_big4","ew_bagger1","ew_bagger2","ew_bagger","ew_bagger3","ew_bagger4","ew_bagger5","ew_bagger6","ew_bagger7","ew_ws1","ew_ws2","ew_ws3","ew_ws4","ew_stacking1","ew_stacking2","ew_stacking3","ew_stacking4","ew_stacking5","ew_stacking6","ew_stacking7","ew_stacking8","ew_stacking9","ew_stacking10");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'date' => 'required',
				'gr' => 'required',
				'shift' => 'required',
				'shift_inch1' => 'required',
				'gr_leader' => 'required',
				'ghk' => 'required',
				'qc1' => 'required',
				'online_checker1' => 'required',
				'fitter' => 'required',
				'shift_elect1' => 'required',
				'olc' => 'required',
				'warehouse' => 'required',
				'bag_coding' => 'required',
				'store_incharge' => 'required',
				'wt_variation_checker' => 'required',
				'minor1' => 'required',
				'forklift1' => 'required',
				'wl_feeding1' => 'required',
				'wl_psm1' => 'required',
				'wl_8mtr1' => 'required',
				'wl_11mtr1' => 'required',
				'wl_mico1' => 'required',
				'wl_subham1' => 'required',
				'wl_subhambagger4t' => 'required',
				'wl_subhambagger5t' => 'required',
				'wl_bagger1' => 'required',
				'wl_ws1' => 'required',
				'wl_stacking1' => 'required',
				'dmx_feeding' => 'required',
				'dmx_sigma' => 'required',
				'dmx_subham' => 'required',
				'dmx_hasia' => 'required',
				'dmx_ws1' => 'required',
				'dmx_bagger' => 'required',
				'dmx_stacking1' => 'required',
				'ew_feeding' => 'required',
				'ew_boone' => 'required',
				'ew_fg1' => 'required',
				'ew_subham' => 'required',
				'ew_bosch' => 'required',
				'ew_big1' => 'required',
				'ew_bagger1' => 'required',
				'ew_ws1' => 'required',
				'ew_stacking1' => 'required',
			);
			$this->sanitize_array = array(
				'date' => 'sanitize_string',
				'gr' => 'sanitize_string',
				'shift' => 'sanitize_string',
				'shift_inch1' => 'sanitize_string',
				'shift_inch2' => 'sanitize_string',
				'gr_leader' => 'sanitize_string',
				'ghk' => 'sanitize_string',
				'qc1' => 'sanitize_string',
				'qc2' => 'sanitize_string',
				'online_checker1' => 'sanitize_string',
				'online_checker2' => 'sanitize_string',
				'online_checker3' => 'sanitize_string',
				'fitter' => 'sanitize_string',
				'shift_elect1' => 'sanitize_string',
				'shift_elect2' => 'sanitize_string',
				'olc' => 'sanitize_string',
				'warehouse' => 'sanitize_string',
				'bag_coding' => 'sanitize_string',
				'store_incharge' => 'sanitize_string',
				'wt_variation_checker' => 'sanitize_string',
				'minor1' => 'sanitize_string',
				'minor2' => 'sanitize_string',
				'minor3' => 'sanitize_string',
				'minor4' => 'sanitize_string',
				'minor5' => 'sanitize_string',
				'minor6' => 'sanitize_string',
				'minor7' => 'sanitize_string',
				'minor8' => 'sanitize_string',
				'forklift1' => 'sanitize_string',
				'forklift2' => 'sanitize_string',
				'forklift3' => 'sanitize_string',
				'wl_feeding1' => 'sanitize_string',
				'wl_feeding2' => 'sanitize_string',
				'wl_feeding3' => 'sanitize_string',
				'wl_feeding4' => 'sanitize_string',
				'wl_feeding5' => 'sanitize_string',
				'wl_feeding6' => 'sanitize_string',
				'wl_feeding7' => 'sanitize_string',
				'wl_feeding8' => 'sanitize_string',
				'wl_psm1' => 'sanitize_string',
				'wl_psm2' => 'sanitize_string',
				'wl_8mtr1' => 'sanitize_string',
				'wl_8mtr2' => 'sanitize_string',
				'wl_11mtr1' => 'sanitize_string',
				'wl_11mtr2' => 'sanitize_string',
				'wl_mico1' => 'sanitize_string',
				'wl_mico2' => 'sanitize_string',
				'wl_mico3' => 'sanitize_string',
				'wl_mico4' => 'sanitize_string',
				'wl_mico5' => 'sanitize_string',
				'wl_mico6' => 'sanitize_string',
				'wl_subham1' => 'sanitize_string',
				'wl_subham2' => 'sanitize_string',
				'wl_subham3' => 'sanitize_string',
				'wl_subham4' => 'sanitize_string',
				'wl_subhambagger4t' => 'sanitize_string',
				'wl_subhambagger5t' => 'sanitize_string',
				'wl_bagger1' => 'sanitize_string',
				'wl_bagger2' => 'sanitize_string',
				'wl_bagger3' => 'sanitize_string',
				'wl_bagger4' => 'sanitize_string',
				'wl_bagger5' => 'sanitize_string',
				'wl_bagger6' => 'sanitize_string',
				'wl_ws1' => 'sanitize_string',
				'wl_ws2' => 'sanitize_string',
				'wl_ws3' => 'sanitize_string',
				'wl_ws4' => 'sanitize_string',
				'wl_ws5' => 'sanitize_string',
				'wl_ws6' => 'sanitize_string',
				'wl_stacking1' => 'sanitize_string',
				'wl_stacking2' => 'sanitize_string',
				'wl_stacking3' => 'sanitize_string',
				'wl_stacking4' => 'sanitize_string',
				'wl_stacking5' => 'sanitize_string',
				'wl_stacking6' => 'sanitize_string',
				'dmx_feeding' => 'sanitize_string',
				'dmx_feeding1' => 'sanitize_string',
				'dmx_sigma' => 'sanitize_string',
				'dmx_sigma1' => 'sanitize_string',
				'dmx_subham' => 'sanitize_string',
				'dmx_subham1' => 'sanitize_string',
				'dmx_subham2' => 'sanitize_string',
				'dmx_hasia' => 'sanitize_string',
				'dmx_hasia1' => 'sanitize_string',
				'dmx_ws1' => 'sanitize_string',
				'dmx_ws2' => 'sanitize_string',
				'dmx_bagger' => 'sanitize_string',
				'dmx_bagger1' => 'sanitize_string',
				'dmx_stacking1' => 'sanitize_string',
				'dmx_stacking2' => 'sanitize_string',
				'ew_feeding' => 'sanitize_string',
				'ew_feeding1' => 'sanitize_string',
				'ew_boone' => 'sanitize_string',
				'ew_boone1' => 'sanitize_string',
				'ew_fg1' => 'sanitize_string',
				'ew_fg2' => 'sanitize_string',
				'ew_fg3' => 'sanitize_string',
				'ew_fg4' => 'sanitize_string',
				'ew_fg6' => 'sanitize_string',
				'ew_fg7' => 'sanitize_string',
				'ew_subham' => 'sanitize_string',
				'ew_subham1' => 'sanitize_string',
				'ew_subham2' => 'sanitize_string',
				'ew_subham3' => 'sanitize_string',
				'ew_subham4' => 'sanitize_string',
				'ew_subham5' => 'sanitize_string',
				'ew_subham6' => 'sanitize_string',
				'ew_subham7' => 'sanitize_string',
				'ew_bosch' => 'sanitize_string',
				'ew_bosch1' => 'sanitize_string',
				'ew_bosch2' => 'sanitize_string',
				'ew_big1' => 'sanitize_string',
				'ew_big2' => 'sanitize_string',
				'ew_big3' => 'sanitize_string',
				'ew_big4' => 'sanitize_string',
				'ew_bagger1' => 'sanitize_string',
				'ew_bagger2' => 'sanitize_string',
				'ew_bagger' => 'sanitize_string',
				'ew_bagger3' => 'sanitize_string',
				'ew_bagger4' => 'sanitize_string',
				'ew_bagger5' => 'sanitize_string',
				'ew_bagger6' => 'sanitize_string',
				'ew_bagger7' => 'sanitize_string',
				'ew_ws1' => 'sanitize_string',
				'ew_ws2' => 'sanitize_string',
				'ew_ws3' => 'sanitize_string',
				'ew_ws4' => 'sanitize_string',
				'ew_stacking1' => 'sanitize_string',
				'ew_stacking2' => 'sanitize_string',
				'ew_stacking3' => 'sanitize_string',
				'ew_stacking4' => 'sanitize_string',
				'ew_stacking5' => 'sanitize_string',
				'ew_stacking6' => 'sanitize_string',
				'ew_stacking7' => 'sanitize_string',
				'ew_stacking8' => 'sanitize_string',
				'ew_stacking9' => 'sanitize_string',
				'ew_stacking10' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("emp.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("emp");
				}
				else{
					if($db->getLastError()){
						$this->set_page_error();
					}
					elseif(!$numRows){
						//not an error, but no record was updated
						$page_error = "No record updated";
						$this->set_page_error($page_error);
						$this->set_flash_msg($page_error, "warning");
						return	$this->redirect("emp");
					}
				}
			}
		}
		$db->where("emp.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Emp";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("emp/edit.php", $data);
	}
	/**
     * Update single field
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function editfield($rec_id = null, $formdata = null){
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		//editable fields
		$fields = $this->fields = array("id","date","gr","shift","shift_inch1","shift_inch2","gr_leader","ghk","qc1","qc2","online_checker1","online_checker2","online_checker3","fitter","shift_elect1","shift_elect2","olc","warehouse","bag_coding","store_incharge","wt_variation_checker","minor1","minor2","minor3","minor4","minor5","minor6","minor7","minor8","forklift1","forklift2","forklift3","wl_feeding1","wl_feeding2","wl_feeding3","wl_feeding4","wl_feeding5","wl_feeding6","wl_feeding7","wl_feeding8","wl_psm1","wl_psm2","wl_8mtr1","wl_8mtr2","wl_11mtr1","wl_11mtr2","wl_mico1","wl_mico2","wl_mico3","wl_mico4","wl_mico5","wl_mico6","wl_subham1","wl_subham2","wl_subham3","wl_subham4","wl_subhambagger4t","wl_subhambagger5t","wl_bagger1","wl_bagger2","wl_bagger3","wl_bagger4","wl_bagger5","wl_bagger6","wl_ws1","wl_ws2","wl_ws3","wl_ws4","wl_ws5","wl_ws6","wl_stacking1","wl_stacking2","wl_stacking3","wl_stacking4","wl_stacking5","wl_stacking6","dmx_feeding","dmx_feeding1","dmx_sigma","dmx_sigma1","dmx_subham","dmx_subham1","dmx_subham2","dmx_hasia","dmx_hasia1","dmx_ws1","dmx_ws2","dmx_bagger","dmx_bagger1","dmx_stacking1","dmx_stacking2","ew_feeding","ew_feeding1","ew_boone","ew_boone1","ew_fg1","ew_fg2","ew_fg3","ew_fg4","ew_fg6","ew_fg7","ew_subham","ew_subham1","ew_subham2","ew_subham3","ew_subham4","ew_subham5","ew_subham6","ew_subham7","ew_bosch","ew_bosch1","ew_bosch2","ew_big1","ew_big2","ew_big3","ew_big4","ew_bagger1","ew_bagger2","ew_bagger","ew_bagger3","ew_bagger4","ew_bagger5","ew_bagger6","ew_bagger7","ew_ws1","ew_ws2","ew_ws3","ew_ws4","ew_stacking1","ew_stacking2","ew_stacking3","ew_stacking4","ew_stacking5","ew_stacking6","ew_stacking7","ew_stacking8","ew_stacking9","ew_stacking10");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'date' => 'required',
				'gr' => 'required',
				'shift' => 'required',
				'shift_inch1' => 'required',
				'gr_leader' => 'required',
				'ghk' => 'required',
				'qc1' => 'required',
				'online_checker1' => 'required',
				'fitter' => 'required',
				'shift_elect1' => 'required',
				'olc' => 'required',
				'warehouse' => 'required',
				'bag_coding' => 'required',
				'store_incharge' => 'required',
				'wt_variation_checker' => 'required',
				'minor1' => 'required',
				'forklift1' => 'required',
				'wl_feeding1' => 'required',
				'wl_psm1' => 'required',
				'wl_8mtr1' => 'required',
				'wl_11mtr1' => 'required',
				'wl_mico1' => 'required',
				'wl_subham1' => 'required',
				'wl_subhambagger4t' => 'required',
				'wl_subhambagger5t' => 'required',
				'wl_bagger1' => 'required',
				'wl_ws1' => 'required',
				'wl_stacking1' => 'required',
				'dmx_feeding' => 'required',
				'dmx_sigma' => 'required',
				'dmx_subham' => 'required',
				'dmx_hasia' => 'required',
				'dmx_ws1' => 'required',
				'dmx_bagger' => 'required',
				'dmx_stacking1' => 'required',
				'ew_feeding' => 'required',
				'ew_boone' => 'required',
				'ew_fg1' => 'required',
				'ew_subham' => 'required',
				'ew_bosch' => 'required',
				'ew_big1' => 'required',
				'ew_bagger1' => 'required',
				'ew_ws1' => 'required',
				'ew_stacking1' => 'required',
			);
			$this->sanitize_array = array(
				'date' => 'sanitize_string',
				'gr' => 'sanitize_string',
				'shift' => 'sanitize_string',
				'shift_inch1' => 'sanitize_string',
				'shift_inch2' => 'sanitize_string',
				'gr_leader' => 'sanitize_string',
				'ghk' => 'sanitize_string',
				'qc1' => 'sanitize_string',
				'qc2' => 'sanitize_string',
				'online_checker1' => 'sanitize_string',
				'online_checker2' => 'sanitize_string',
				'online_checker3' => 'sanitize_string',
				'fitter' => 'sanitize_string',
				'shift_elect1' => 'sanitize_string',
				'shift_elect2' => 'sanitize_string',
				'olc' => 'sanitize_string',
				'warehouse' => 'sanitize_string',
				'bag_coding' => 'sanitize_string',
				'store_incharge' => 'sanitize_string',
				'wt_variation_checker' => 'sanitize_string',
				'minor1' => 'sanitize_string',
				'minor2' => 'sanitize_string',
				'minor3' => 'sanitize_string',
				'minor4' => 'sanitize_string',
				'minor5' => 'sanitize_string',
				'minor6' => 'sanitize_string',
				'minor7' => 'sanitize_string',
				'minor8' => 'sanitize_string',
				'forklift1' => 'sanitize_string',
				'forklift2' => 'sanitize_string',
				'forklift3' => 'sanitize_string',
				'wl_feeding1' => 'sanitize_string',
				'wl_feeding2' => 'sanitize_string',
				'wl_feeding3' => 'sanitize_string',
				'wl_feeding4' => 'sanitize_string',
				'wl_feeding5' => 'sanitize_string',
				'wl_feeding6' => 'sanitize_string',
				'wl_feeding7' => 'sanitize_string',
				'wl_feeding8' => 'sanitize_string',
				'wl_psm1' => 'sanitize_string',
				'wl_psm2' => 'sanitize_string',
				'wl_8mtr1' => 'sanitize_string',
				'wl_8mtr2' => 'sanitize_string',
				'wl_11mtr1' => 'sanitize_string',
				'wl_11mtr2' => 'sanitize_string',
				'wl_mico1' => 'sanitize_string',
				'wl_mico2' => 'sanitize_string',
				'wl_mico3' => 'sanitize_string',
				'wl_mico4' => 'sanitize_string',
				'wl_mico5' => 'sanitize_string',
				'wl_mico6' => 'sanitize_string',
				'wl_subham1' => 'sanitize_string',
				'wl_subham2' => 'sanitize_string',
				'wl_subham3' => 'sanitize_string',
				'wl_subham4' => 'sanitize_string',
				'wl_subhambagger4t' => 'sanitize_string',
				'wl_subhambagger5t' => 'sanitize_string',
				'wl_bagger1' => 'sanitize_string',
				'wl_bagger2' => 'sanitize_string',
				'wl_bagger3' => 'sanitize_string',
				'wl_bagger4' => 'sanitize_string',
				'wl_bagger5' => 'sanitize_string',
				'wl_bagger6' => 'sanitize_string',
				'wl_ws1' => 'sanitize_string',
				'wl_ws2' => 'sanitize_string',
				'wl_ws3' => 'sanitize_string',
				'wl_ws4' => 'sanitize_string',
				'wl_ws5' => 'sanitize_string',
				'wl_ws6' => 'sanitize_string',
				'wl_stacking1' => 'sanitize_string',
				'wl_stacking2' => 'sanitize_string',
				'wl_stacking3' => 'sanitize_string',
				'wl_stacking4' => 'sanitize_string',
				'wl_stacking5' => 'sanitize_string',
				'wl_stacking6' => 'sanitize_string',
				'dmx_feeding' => 'sanitize_string',
				'dmx_feeding1' => 'sanitize_string',
				'dmx_sigma' => 'sanitize_string',
				'dmx_sigma1' => 'sanitize_string',
				'dmx_subham' => 'sanitize_string',
				'dmx_subham1' => 'sanitize_string',
				'dmx_subham2' => 'sanitize_string',
				'dmx_hasia' => 'sanitize_string',
				'dmx_hasia1' => 'sanitize_string',
				'dmx_ws1' => 'sanitize_string',
				'dmx_ws2' => 'sanitize_string',
				'dmx_bagger' => 'sanitize_string',
				'dmx_bagger1' => 'sanitize_string',
				'dmx_stacking1' => 'sanitize_string',
				'dmx_stacking2' => 'sanitize_string',
				'ew_feeding' => 'sanitize_string',
				'ew_feeding1' => 'sanitize_string',
				'ew_boone' => 'sanitize_string',
				'ew_boone1' => 'sanitize_string',
				'ew_fg1' => 'sanitize_string',
				'ew_fg2' => 'sanitize_string',
				'ew_fg3' => 'sanitize_string',
				'ew_fg4' => 'sanitize_string',
				'ew_fg6' => 'sanitize_string',
				'ew_fg7' => 'sanitize_string',
				'ew_subham' => 'sanitize_string',
				'ew_subham1' => 'sanitize_string',
				'ew_subham2' => 'sanitize_string',
				'ew_subham3' => 'sanitize_string',
				'ew_subham4' => 'sanitize_string',
				'ew_subham5' => 'sanitize_string',
				'ew_subham6' => 'sanitize_string',
				'ew_subham7' => 'sanitize_string',
				'ew_bosch' => 'sanitize_string',
				'ew_bosch1' => 'sanitize_string',
				'ew_bosch2' => 'sanitize_string',
				'ew_big1' => 'sanitize_string',
				'ew_big2' => 'sanitize_string',
				'ew_big3' => 'sanitize_string',
				'ew_big4' => 'sanitize_string',
				'ew_bagger1' => 'sanitize_string',
				'ew_bagger2' => 'sanitize_string',
				'ew_bagger' => 'sanitize_string',
				'ew_bagger3' => 'sanitize_string',
				'ew_bagger4' => 'sanitize_string',
				'ew_bagger5' => 'sanitize_string',
				'ew_bagger6' => 'sanitize_string',
				'ew_bagger7' => 'sanitize_string',
				'ew_ws1' => 'sanitize_string',
				'ew_ws2' => 'sanitize_string',
				'ew_ws3' => 'sanitize_string',
				'ew_ws4' => 'sanitize_string',
				'ew_stacking1' => 'sanitize_string',
				'ew_stacking2' => 'sanitize_string',
				'ew_stacking3' => 'sanitize_string',
				'ew_stacking4' => 'sanitize_string',
				'ew_stacking5' => 'sanitize_string',
				'ew_stacking6' => 'sanitize_string',
				'ew_stacking7' => 'sanitize_string',
				'ew_stacking8' => 'sanitize_string',
				'ew_stacking9' => 'sanitize_string',
				'ew_stacking10' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("emp.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount();
				if($bool && $numRows){
					return render_json(
						array(
							'num_rows' =>$numRows,
							'rec_id' =>$rec_id,
						)
					);
				}
				else{
					if($db->getLastError()){
						$page_error = $db->getLastError();
					}
					elseif(!$numRows){
						$page_error = "No record updated";
					}
					render_error($page_error);
				}
			}
			else{
				render_error($this->view->page_error);
			}
		}
		return null;
	}
	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
     * @return BaseView
     */
	function delete($rec_id = null){
		Csrf::cross_check();
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$this->rec_id = $rec_id;
		//form multiple delete, split record id separated by comma into array
		$arr_rec_id = array_map('trim', explode(",", $rec_id));
		$db->where("emp.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("emp");
	}
}
