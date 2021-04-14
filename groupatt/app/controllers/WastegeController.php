<?php 
/**
 * Wastege Page Controller
 * @category  Controller
 */
class WastegeController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "wastege";
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
			"shift", 
			"pink", 
			"blue", 
			"domex", 
			"easywash", 
			"grp", 
			"manpower", 
			"wh60m10", 
			"wh155m2", 
			"wh400m4", 
			"wh1000m7", 
			"wh2000m7", 
			"d20m17", 
			"d100m18", 
			"d250m16", 
			"d400m16", 
			"ew90m20", 
			"ew500m25", 
			"ew1000m25", 
			"ew100m20", 
			"wh155m3", 
			"wh155m4", 
			"wh400m7", 
			"wh400m8", 
			"wh400m9", 
			"wh1000m8", 
			"wh2000m8", 
			"ew90m21", 
			"ew90m22", 
			"ew90m23", 
			"ew90m24", 
			"ew90m27", 
			"ew100m21", 
			"ew100m22", 
			"ew100m23", 
			"ew100m24", 
			"ew100m27", 
			"ew500m26", 
			"ew1000m26");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				wastege.id LIKE ? OR 
				wastege.date LIKE ? OR 
				wastege.shift LIKE ? OR 
				wastege.pink LIKE ? OR 
				wastege.blue LIKE ? OR 
				wastege.domex LIKE ? OR 
				wastege.easywash LIKE ? OR 
				wastege.grp LIKE ? OR 
				wastege.manpower LIKE ? OR 
				wastege.wh60m10 LIKE ? OR 
				wastege.wh155m2 LIKE ? OR 
				wastege.wh400m4 LIKE ? OR 
				wastege.wh1000m7 LIKE ? OR 
				wastege.wh2000m7 LIKE ? OR 
				wastege.d20m17 LIKE ? OR 
				wastege.d100m18 LIKE ? OR 
				wastege.d250m16 LIKE ? OR 
				wastege.d400m16 LIKE ? OR 
				wastege.ew90m20 LIKE ? OR 
				wastege.ew500m25 LIKE ? OR 
				wastege.ew1000m25 LIKE ? OR 
				wastege.ew100m20 LIKE ? OR 
				wastege.wh155m3 LIKE ? OR 
				wastege.wh155m4 LIKE ? OR 
				wastege.wh400m7 LIKE ? OR 
				wastege.wh400m8 LIKE ? OR 
				wastege.wh400m9 LIKE ? OR 
				wastege.wh1000m8 LIKE ? OR 
				wastege.wh2000m8 LIKE ? OR 
				wastege.ew90m21 LIKE ? OR 
				wastege.ew90m22 LIKE ? OR 
				wastege.ew90m23 LIKE ? OR 
				wastege.ew90m24 LIKE ? OR 
				wastege.ew90m27 LIKE ? OR 
				wastege.ew100m21 LIKE ? OR 
				wastege.ew100m22 LIKE ? OR 
				wastege.ew100m23 LIKE ? OR 
				wastege.ew100m24 LIKE ? OR 
				wastege.ew100m27 LIKE ? OR 
				wastege.ew500m26 LIKE ? OR 
				wastege.ew1000m26 LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "wastege/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("wastege.id", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Wastege";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("wastege/list.php", $data); //render the full page
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
			"shift", 
			"pink", 
			"blue", 
			"domex", 
			"easywash", 
			"grp", 
			"manpower", 
			"wh60m10", 
			"wh155m2", 
			"wh400m4", 
			"wh1000m7", 
			"wh2000m7", 
			"d20m17", 
			"d100m18", 
			"d250m16", 
			"d400m16", 
			"ew90m20", 
			"ew500m25", 
			"ew1000m25", 
			"ew100m20", 
			"wh155m3", 
			"wh155m4", 
			"wh400m7", 
			"wh400m8", 
			"wh400m9", 
			"wh1000m8", 
			"wh2000m8", 
			"ew90m21", 
			"ew90m22", 
			"ew90m23", 
			"ew90m24", 
			"ew90m27", 
			"ew100m21", 
			"ew100m22", 
			"ew100m23", 
			"ew100m24", 
			"ew100m27", 
			"ew500m26", 
			"ew1000m26");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("wastege.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  Wastege";
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
		return $this->render_view("wastege/view.php", $record);
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
			$fields = $this->fields = array("date","shift","pink","blue","domex","easywash","grp","manpower","wh60m10","wh155m2","wh400m4","wh1000m7","wh2000m7","d20m17","d100m18","d250m16","d400m16","ew90m20","ew500m25","ew1000m25","ew100m20","wh155m3","wh155m4","wh400m7","wh400m8","wh400m9","wh1000m8","wh2000m8","ew90m21","ew90m22","ew90m23","ew90m24","ew90m27","ew100m21","ew100m22","ew100m23","ew100m24","ew100m27","ew500m26","ew1000m26");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'date' => 'required',
				'shift' => 'required',
				'pink' => 'required',
				'blue' => 'required',
				'domex' => 'required',
				'easywash' => 'required',
				'grp' => 'required',
				'manpower' => 'required',
				'wh60m10' => 'required|numeric',
				'wh155m2' => 'required|numeric',
				'wh400m4' => 'required|numeric',
				'wh1000m7' => 'required|numeric',
				'wh2000m7' => 'required|numeric',
				'd20m17' => 'required|numeric',
				'd100m18' => 'required|numeric',
				'd250m16' => 'required|numeric',
				'd400m16' => 'required|numeric',
				'ew90m20' => 'required|numeric',
				'ew500m25' => 'required|numeric',
				'ew1000m25' => 'required|numeric',
				'ew100m20' => 'required|numeric',
				'wh155m3' => 'required|numeric',
				'wh155m4' => 'required|numeric',
				'wh400m7' => 'required|numeric',
				'wh400m8' => 'required|numeric',
				'wh400m9' => 'required|numeric',
				'wh1000m8' => 'required|numeric',
				'wh2000m8' => 'required|numeric',
				'ew90m21' => 'required|numeric',
				'ew90m22' => 'required|numeric',
				'ew90m23' => 'required|numeric',
				'ew90m24' => 'required|numeric',
				'ew90m27' => 'required|numeric',
				'ew100m21' => 'required|numeric',
				'ew100m22' => 'required|numeric',
				'ew100m23' => 'required|numeric',
				'ew100m24' => 'required|numeric',
				'ew100m27' => 'required|numeric',
				'ew500m26' => 'required|numeric',
				'ew1000m26' => 'required|numeric',
			);
			$this->sanitize_array = array(
				'date' => 'sanitize_string',
				'shift' => 'sanitize_string',
				'pink' => 'sanitize_string',
				'blue' => 'sanitize_string',
				'domex' => 'sanitize_string',
				'easywash' => 'sanitize_string',
				'grp' => 'sanitize_string',
				'manpower' => 'sanitize_string',
				'wh60m10' => 'sanitize_string',
				'wh155m2' => 'sanitize_string',
				'wh400m4' => 'sanitize_string',
				'wh1000m7' => 'sanitize_string',
				'wh2000m7' => 'sanitize_string',
				'd20m17' => 'sanitize_string',
				'd100m18' => 'sanitize_string',
				'd250m16' => 'sanitize_string',
				'd400m16' => 'sanitize_string',
				'ew90m20' => 'sanitize_string',
				'ew500m25' => 'sanitize_string',
				'ew1000m25' => 'sanitize_string',
				'ew100m20' => 'sanitize_string',
				'wh155m3' => 'sanitize_string',
				'wh155m4' => 'sanitize_string',
				'wh400m7' => 'sanitize_string',
				'wh400m8' => 'sanitize_string',
				'wh400m9' => 'sanitize_string',
				'wh1000m8' => 'sanitize_string',
				'wh2000m8' => 'sanitize_string',
				'ew90m21' => 'sanitize_string',
				'ew90m22' => 'sanitize_string',
				'ew90m23' => 'sanitize_string',
				'ew90m24' => 'sanitize_string',
				'ew90m27' => 'sanitize_string',
				'ew100m21' => 'sanitize_string',
				'ew100m22' => 'sanitize_string',
				'ew100m23' => 'sanitize_string',
				'ew100m24' => 'sanitize_string',
				'ew100m27' => 'sanitize_string',
				'ew500m26' => 'sanitize_string',
				'ew1000m26' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("wastege");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Wastege";
		$this->render_view("wastege/add.php");
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
		$fields = $this->fields = array("id","date","shift","pink","blue","domex","easywash","grp","manpower","wh60m10","wh155m2","wh400m4","wh1000m7","wh2000m7","d20m17","d100m18","d250m16","d400m16","ew90m20","ew500m25","ew1000m25","ew100m20","wh155m3","wh155m4","wh400m7","wh400m8","wh400m9","wh1000m8","wh2000m8","ew90m21","ew90m22","ew90m23","ew90m24","ew90m27","ew100m21","ew100m22","ew100m23","ew100m24","ew100m27","ew500m26","ew1000m26");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'date' => 'required',
				'shift' => 'required',
				'pink' => 'required',
				'blue' => 'required',
				'domex' => 'required',
				'easywash' => 'required',
				'grp' => 'required',
				'manpower' => 'required',
				'wh60m10' => 'required|numeric',
				'wh155m2' => 'required|numeric',
				'wh400m4' => 'required|numeric',
				'wh1000m7' => 'required|numeric',
				'wh2000m7' => 'required|numeric',
				'd20m17' => 'required|numeric',
				'd100m18' => 'required|numeric',
				'd250m16' => 'required|numeric',
				'd400m16' => 'required|numeric',
				'ew90m20' => 'required|numeric',
				'ew500m25' => 'required|numeric',
				'ew1000m25' => 'required|numeric',
				'ew100m20' => 'required|numeric',
				'wh155m3' => 'required|numeric',
				'wh155m4' => 'required|numeric',
				'wh400m7' => 'required|numeric',
				'wh400m8' => 'required|numeric',
				'wh400m9' => 'required|numeric',
				'wh1000m8' => 'required|numeric',
				'wh2000m8' => 'required|numeric',
				'ew90m21' => 'required|numeric',
				'ew90m22' => 'required|numeric',
				'ew90m23' => 'required|numeric',
				'ew90m24' => 'required|numeric',
				'ew90m27' => 'required|numeric',
				'ew100m21' => 'required|numeric',
				'ew100m22' => 'required|numeric',
				'ew100m23' => 'required|numeric',
				'ew100m24' => 'required|numeric',
				'ew100m27' => 'required|numeric',
				'ew500m26' => 'required|numeric',
				'ew1000m26' => 'required|numeric',
			);
			$this->sanitize_array = array(
				'date' => 'sanitize_string',
				'shift' => 'sanitize_string',
				'pink' => 'sanitize_string',
				'blue' => 'sanitize_string',
				'domex' => 'sanitize_string',
				'easywash' => 'sanitize_string',
				'grp' => 'sanitize_string',
				'manpower' => 'sanitize_string',
				'wh60m10' => 'sanitize_string',
				'wh155m2' => 'sanitize_string',
				'wh400m4' => 'sanitize_string',
				'wh1000m7' => 'sanitize_string',
				'wh2000m7' => 'sanitize_string',
				'd20m17' => 'sanitize_string',
				'd100m18' => 'sanitize_string',
				'd250m16' => 'sanitize_string',
				'd400m16' => 'sanitize_string',
				'ew90m20' => 'sanitize_string',
				'ew500m25' => 'sanitize_string',
				'ew1000m25' => 'sanitize_string',
				'ew100m20' => 'sanitize_string',
				'wh155m3' => 'sanitize_string',
				'wh155m4' => 'sanitize_string',
				'wh400m7' => 'sanitize_string',
				'wh400m8' => 'sanitize_string',
				'wh400m9' => 'sanitize_string',
				'wh1000m8' => 'sanitize_string',
				'wh2000m8' => 'sanitize_string',
				'ew90m21' => 'sanitize_string',
				'ew90m22' => 'sanitize_string',
				'ew90m23' => 'sanitize_string',
				'ew90m24' => 'sanitize_string',
				'ew90m27' => 'sanitize_string',
				'ew100m21' => 'sanitize_string',
				'ew100m22' => 'sanitize_string',
				'ew100m23' => 'sanitize_string',
				'ew100m24' => 'sanitize_string',
				'ew100m27' => 'sanitize_string',
				'ew500m26' => 'sanitize_string',
				'ew1000m26' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("wastege.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("wastege");
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
						return	$this->redirect("wastege");
					}
				}
			}
		}
		$db->where("wastege.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Wastege";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("wastege/edit.php", $data);
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
		$fields = $this->fields = array("id","date","shift","pink","blue","domex","easywash","grp","manpower","wh60m10","wh155m2","wh400m4","wh1000m7","wh2000m7","d20m17","d100m18","d250m16","d400m16","ew90m20","ew500m25","ew1000m25","ew100m20","wh155m3","wh155m4","wh400m7","wh400m8","wh400m9","wh1000m8","wh2000m8","ew90m21","ew90m22","ew90m23","ew90m24","ew90m27","ew100m21","ew100m22","ew100m23","ew100m24","ew100m27","ew500m26","ew1000m26");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'date' => 'required',
				'shift' => 'required',
				'pink' => 'required',
				'blue' => 'required',
				'domex' => 'required',
				'easywash' => 'required',
				'grp' => 'required',
				'manpower' => 'required',
				'wh60m10' => 'required|numeric',
				'wh155m2' => 'required|numeric',
				'wh400m4' => 'required|numeric',
				'wh1000m7' => 'required|numeric',
				'wh2000m7' => 'required|numeric',
				'd20m17' => 'required|numeric',
				'd100m18' => 'required|numeric',
				'd250m16' => 'required|numeric',
				'd400m16' => 'required|numeric',
				'ew90m20' => 'required|numeric',
				'ew500m25' => 'required|numeric',
				'ew1000m25' => 'required|numeric',
				'ew100m20' => 'required|numeric',
				'wh155m3' => 'required|numeric',
				'wh155m4' => 'required|numeric',
				'wh400m7' => 'required|numeric',
				'wh400m8' => 'required|numeric',
				'wh400m9' => 'required|numeric',
				'wh1000m8' => 'required|numeric',
				'wh2000m8' => 'required|numeric',
				'ew90m21' => 'required|numeric',
				'ew90m22' => 'required|numeric',
				'ew90m23' => 'required|numeric',
				'ew90m24' => 'required|numeric',
				'ew90m27' => 'required|numeric',
				'ew100m21' => 'required|numeric',
				'ew100m22' => 'required|numeric',
				'ew100m23' => 'required|numeric',
				'ew100m24' => 'required|numeric',
				'ew100m27' => 'required|numeric',
				'ew500m26' => 'required|numeric',
				'ew1000m26' => 'required|numeric',
			);
			$this->sanitize_array = array(
				'date' => 'sanitize_string',
				'shift' => 'sanitize_string',
				'pink' => 'sanitize_string',
				'blue' => 'sanitize_string',
				'domex' => 'sanitize_string',
				'easywash' => 'sanitize_string',
				'grp' => 'sanitize_string',
				'manpower' => 'sanitize_string',
				'wh60m10' => 'sanitize_string',
				'wh155m2' => 'sanitize_string',
				'wh400m4' => 'sanitize_string',
				'wh1000m7' => 'sanitize_string',
				'wh2000m7' => 'sanitize_string',
				'd20m17' => 'sanitize_string',
				'd100m18' => 'sanitize_string',
				'd250m16' => 'sanitize_string',
				'd400m16' => 'sanitize_string',
				'ew90m20' => 'sanitize_string',
				'ew500m25' => 'sanitize_string',
				'ew1000m25' => 'sanitize_string',
				'ew100m20' => 'sanitize_string',
				'wh155m3' => 'sanitize_string',
				'wh155m4' => 'sanitize_string',
				'wh400m7' => 'sanitize_string',
				'wh400m8' => 'sanitize_string',
				'wh400m9' => 'sanitize_string',
				'wh1000m8' => 'sanitize_string',
				'wh2000m8' => 'sanitize_string',
				'ew90m21' => 'sanitize_string',
				'ew90m22' => 'sanitize_string',
				'ew90m23' => 'sanitize_string',
				'ew90m24' => 'sanitize_string',
				'ew90m27' => 'sanitize_string',
				'ew100m21' => 'sanitize_string',
				'ew100m22' => 'sanitize_string',
				'ew100m23' => 'sanitize_string',
				'ew100m24' => 'sanitize_string',
				'ew100m27' => 'sanitize_string',
				'ew500m26' => 'sanitize_string',
				'ew1000m26' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("wastege.id", $rec_id);;
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
		$db->where("wastege.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("wastege");
	}
}
