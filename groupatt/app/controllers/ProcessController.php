<?php 
/**
 * Process Page Controller
 * @category  Controller
 */
class ProcessController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "process";
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
			"grp", 
			"pink", 
			"blue", 
			"domex", 
			"easywash", 
			"fg", 
			"batch_size", 
			"( d100m18 * .006 )+
( d20m17 * .0096 ) +
( d250m16 *.0075 ) +
( d400m16 * .0096 ) AS domexmt", 
			"(wh60m10 * .0072) +
((wh155m2 + wh155m3 + wh155m4) * .0186) +
((wh400m4 + wh400m7 + wh400m8 + wh400m9) * .012)+
((wh1000m7 + wh1000m8) * .025) +
((wh2000m7 + wh2000m8) * .024) + ((Wh150m2 + Wh150m3 + Wh150m4) * .009) AS wheelmt", 
			"((ew90m20 + ew90m21 + ew90m22 + ew90m23 + ew90m24 + ew90m27) * .0108) + ((ew100m20 + ew100m21 + ew100m22 + ew100m23 + ew100m24 + ew100m27) * .012) +((ew500m25 + ew500m26) * .01) + ((ew1000m25 + ew1000m26) * .012) AS ewmt", 
			"(( d100m18 * .006 )+
( d20m17 * .0096 ) +
( d250m16 *.0075 ) +
( d400m16 * .0096 )) 
+
((wh60m10 * .0072) +
((wh155m2 + wh155m3 + wh155m4) * .0186) +
((wh400m4 + wh400m7 + wh400m8 + wh400m9) * .012)+
((wh1000m7 + wh1000m8) * .025) +
((wh2000m7 + wh2000m8) * .024))
+
(((ew90m20 + ew90m21 + ew90m22 + ew90m23 + ew90m24 + ew90m27) * .0108) + ((ew100m20 + ew100m21 + ew100m22 + ew100m23 + ew100m24 + ew100m27) * .012) +((ew500m25 + ew500m26) * .01) + ((ew1000m25 + ew1000m26) * .012)) + ((Wh150m2 + Wh150m3 + Wh150m4) * .009) AS total", 
			"d20m17 * .0096  AS d20", 
			"d100m18 * .006 AS d100", 
			"d250m16 *.0075 AS d250", 
			"d400m16 * .0096 AS d400", 
			"wh60m10 * .0072 AS wh60", 
			"(Wh150m2 + Wh150m3 + Wh150m4) * .009 AS wh150", 
			"(wh155m2 + wh155m3 + wh155m4) * .0186 AS wh155", 
			"(wh400m4 + wh400m7 + wh400m8 + wh400m9) * .012 AS wh400", 
			"(wh1000m7 + wh1000m8) * .025 AS wh1000", 
			"(wh2000m7 + wh2000m8) * .024 AS wh2000", 
			"(ew90m20 + ew90m21 + ew90m22 + ew90m23 + ew90m24 + ew90m27) * .0108 AS ew90", 
			"(ew100m20 + ew100m21 + ew100m22 + ew100m23 + ew100m24 + ew100m27) * .012 AS ew100", 
			"(ew500m25 + ew500m26) * .01 AS ew500", 
			"(ew1000m25 + ew1000m26) * .012 AS ew1000");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				process.id LIKE ? OR 
				process.date LIKE ? OR 
				process.shift LIKE ? OR 
				process.grp LIKE ? OR 
				process.pink LIKE ? OR 
				process.blue LIKE ? OR 
				process.domex LIKE ? OR 
				process.easywash LIKE ? OR 
				process.fg LIKE ? OR 
				process.batch_size LIKE ? OR 
				process.manpower LIKE ? OR 
				process.man_other LIKE ? OR 
				( d100m18 * .006 )+
( d20m17 * .0096 ) +
( d250m16 *.0075 ) +
( d400m16 * .0096 ) LIKE ? OR 
				(wh60m10 * .0072) +
((wh155m2 + wh155m3 + wh155m4) * .0186) +
((wh400m4 + wh400m7 + wh400m8 + wh400m9) * .012)+
((wh1000m7 + wh1000m8) * .025) +
((wh2000m7 + wh2000m8) * .024) + ((Wh150m2 + Wh150m3 + Wh150m4) * .009) LIKE ? OR 
				((ew90m20 + ew90m21 + ew90m22 + ew90m23 + ew90m24 + ew90m27) * .0108) + ((ew100m20 + ew100m21 + ew100m22 + ew100m23 + ew100m24 + ew100m27) * .012) +((ew500m25 + ew500m26) * .01) + ((ew1000m25 + ew1000m26) * .012) LIKE ? OR 
				d20 + d400 + d250 +d100 LIKE ? OR 
				(( d100m18 * .006 )+
( d20m17 * .0096 ) +
( d250m16 *.0075 ) +
( d400m16 * .0096 )) 
+
((wh60m10 * .0072) +
((wh155m2 + wh155m3 + wh155m4) * .0186) +
((wh400m4 + wh400m7 + wh400m8 + wh400m9) * .012)+
((wh1000m7 + wh1000m8) * .025) +
((wh2000m7 + wh2000m8) * .024))
+
(((ew90m20 + ew90m21 + ew90m22 + ew90m23 + ew90m24 + ew90m27) * .0108) + ((ew100m20 + ew100m21 + ew100m22 + ew100m23 + ew100m24 + ew100m27) * .012) +((ew500m25 + ew500m26) * .01) + ((ew1000m25 + ew1000m26) * .012)) + ((Wh150m2 + Wh150m3 + Wh150m4) * .009) LIKE ? OR 
				process.wh60m10 LIKE ? OR 
				process.wh155m2 LIKE ? OR 
				process.wh400m4 LIKE ? OR 
				process.wh1000m7 LIKE ? OR 
				process.wh2000m7 LIKE ? OR 
				process.d20m17 LIKE ? OR 
				process.d100m18 LIKE ? OR 
				process.d250m16 LIKE ? OR 
				process.d400m16 LIKE ? OR 
				process.ew90m20 LIKE ? OR 
				process.ew500m25 LIKE ? OR 
				process.ew1000m25 LIKE ? OR 
				process.ew100m20 LIKE ? OR 
				process.wh155m3 LIKE ? OR 
				process.wh155m4 LIKE ? OR 
				process.wh400m7 LIKE ? OR 
				process.wh400m8 LIKE ? OR 
				process.wh400m9 LIKE ? OR 
				process.wh1000m8 LIKE ? OR 
				process.wh2000m8 LIKE ? OR 
				process.ew90m21 LIKE ? OR 
				process.ew90m22 LIKE ? OR 
				process.ew90m23 LIKE ? OR 
				process.ew90m24 LIKE ? OR 
				process.ew90m27 LIKE ? OR 
				process.ew100m21 LIKE ? OR 
				process.ew100m22 LIKE ? OR 
				process.ew100m23 LIKE ? OR 
				process.ew100m24 LIKE ? OR 
				process.ew100m27 LIKE ? OR 
				process.ew500m26 LIKE ? OR 
				process.ew1000m26 LIKE ? OR 
				d20m17 * .0096  LIKE ? OR 
				d100m18 * .006 LIKE ? OR 
				d250m16 *.0075 LIKE ? OR 
				d400m16 * .0096 LIKE ? OR 
				wh60m10 * .0072 LIKE ? OR 
				(Wh150m2 + Wh150m3 + Wh150m4) * .009 LIKE ? OR 
				(wh155m2 + wh155m3 + wh155m4) * .0186 LIKE ? OR 
				(wh400m4 + wh400m7 + wh400m8 + wh400m9) * .012 LIKE ? OR 
				(wh1000m7 + wh1000m8) * .025 LIKE ? OR 
				(wh2000m7 + wh2000m8) * .024 LIKE ? OR 
				(ew90m20 + ew90m21 + ew90m22 + ew90m23 + ew90m24 + ew90m27) * .0108 LIKE ? OR 
				(ew100m20 + ew100m21 + ew100m22 + ew100m23 + ew100m24 + ew100m27) * .012 LIKE ? OR 
				(ew500m25 + ew500m26) * .01 LIKE ? OR 
				(ew1000m25 + ew1000m26) * .012 LIKE ? OR 
				process.Wh150m2 LIKE ? OR 
				process.Wh150m3 LIKE ? OR 
				process.Wh150m4 LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "process/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("date", "DESC");
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
		if(	!empty($records)){
			foreach($records as &$record){
				$record['date'] = format_date($record['date'],'d-m-Y');
			}
		}
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = $records_count;
		$data->total_records = $total_records;
		$data->total_page = $total_pages;
		if($db->getLastError()){
			$this->set_page_error();
		}
		$page_title = $this->view->page_title = "Production Log Book";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$view_name = (is_ajax() ? "process/ajax-list.php" : "process/list.php");
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
			"shift", 
			"grp", 
			"pink", 
			"blue", 
			"domex", 
			"easywash", 
			"fg", 
			"batch_size", 
			"manpower", 
			"man_other", 
			"wh60m10", 
			"wh155m2", 
			"wh155m3", 
			"wh155m4", 
			"wh400m4", 
			"wh400m7", 
			"wh400m8", 
			"wh400m9", 
			"wh1000m7", 
			"wh1000m8", 
			"wh2000m7", 
			"wh2000m8", 
			"d20m17", 
			"d100m18", 
			"d250m16", 
			"d400m16", 
			"ew90m20", 
			"ew90m21", 
			"ew90m22", 
			"ew90m23", 
			"ew90m24", 
			"ew90m27", 
			"ew100m20", 
			"ew100m21", 
			"ew100m22", 
			"ew100m23", 
			"ew100m24", 
			"ew100m27", 
			"ew500m25", 
			"ew500m26", 
			"ew1000m25", 
			"ew1000m26", 
			"Wh150m2", 
			"Wh150m3", 
			"Wh150m4");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("process.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$record['date'] = format_date($record['date'],'d-m-Y');
			$page_title = $this->view->page_title = "View  Production Log Book";
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
		return $this->render_view("process/view.php", $record);
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
			$fields = $this->fields = array("date","shift","grp","pink","blue","domex","easywash","fg","batch_size","manpower","man_other","wh60m10","Wh150m2","Wh150m3","Wh150m4","wh155m2","wh155m3","wh155m4","wh400m4","wh400m7","wh400m8","wh400m9","wh1000m7","wh1000m8","wh2000m7","wh2000m8","d20m17","d100m18","d250m16","d400m16","ew90m20","ew500m25","ew500m26","ew1000m25","ew1000m26","ew90m21","ew90m22","ew90m23","ew90m24","ew90m27","ew100m20","ew100m21","ew100m22","ew100m23","ew100m24","ew100m27");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'date' => 'required',
				'shift' => 'required',
				'grp' => 'required',
				'pink' => 'required',
				'blue' => 'required',
				'domex' => 'required',
				'easywash' => 'required',
				'fg' => 'required',
				'batch_size' => 'required',
				'manpower' => 'required',
				'man_other' => 'required',
				'wh60m10' => 'required|numeric',
				'Wh150m2' => 'required|numeric',
				'Wh150m3' => 'required|numeric',
				'Wh150m4' => 'required|numeric',
				'wh155m2' => 'required|numeric',
				'wh155m3' => 'required|numeric',
				'wh155m4' => 'required|numeric',
				'wh400m4' => 'required|numeric',
				'wh400m7' => 'required|numeric',
				'wh400m8' => 'required|numeric',
				'wh400m9' => 'required|numeric',
				'wh1000m7' => 'required|numeric',
				'wh1000m8' => 'required|numeric',
				'wh2000m7' => 'required|numeric',
				'wh2000m8' => 'required|numeric',
				'd20m17' => 'required|numeric',
				'd100m18' => 'required|numeric',
				'd250m16' => 'required|numeric',
				'd400m16' => 'required|numeric',
				'ew90m20' => 'required|numeric',
				'ew500m25' => 'required|numeric',
				'ew500m26' => 'required|numeric',
				'ew1000m25' => 'required|numeric',
				'ew1000m26' => 'required|numeric',
				'ew90m21' => 'required|numeric',
				'ew90m22' => 'required|numeric',
				'ew90m23' => 'required|numeric',
				'ew90m24' => 'required|numeric',
				'ew90m27' => 'required|numeric',
				'ew100m20' => 'required|numeric',
				'ew100m21' => 'required|numeric',
				'ew100m22' => 'required|numeric',
				'ew100m23' => 'required|numeric',
				'ew100m24' => 'required|numeric',
				'ew100m27' => 'required|numeric',
			);
			$this->sanitize_array = array(
				'date' => 'sanitize_string',
				'shift' => 'sanitize_string',
				'grp' => 'sanitize_string',
				'pink' => 'sanitize_string',
				'blue' => 'sanitize_string',
				'domex' => 'sanitize_string',
				'easywash' => 'sanitize_string',
				'fg' => 'sanitize_string',
				'batch_size' => 'sanitize_string',
				'manpower' => 'sanitize_string',
				'man_other' => 'sanitize_string',
				'wh60m10' => 'sanitize_string',
				'Wh150m2' => 'sanitize_string',
				'Wh150m3' => 'sanitize_string',
				'Wh150m4' => 'sanitize_string',
				'wh155m2' => 'sanitize_string',
				'wh155m3' => 'sanitize_string',
				'wh155m4' => 'sanitize_string',
				'wh400m4' => 'sanitize_string',
				'wh400m7' => 'sanitize_string',
				'wh400m8' => 'sanitize_string',
				'wh400m9' => 'sanitize_string',
				'wh1000m7' => 'sanitize_string',
				'wh1000m8' => 'sanitize_string',
				'wh2000m7' => 'sanitize_string',
				'wh2000m8' => 'sanitize_string',
				'd20m17' => 'sanitize_string',
				'd100m18' => 'sanitize_string',
				'd250m16' => 'sanitize_string',
				'd400m16' => 'sanitize_string',
				'ew90m20' => 'sanitize_string',
				'ew500m25' => 'sanitize_string',
				'ew500m26' => 'sanitize_string',
				'ew1000m25' => 'sanitize_string',
				'ew1000m26' => 'sanitize_string',
				'ew90m21' => 'sanitize_string',
				'ew90m22' => 'sanitize_string',
				'ew90m23' => 'sanitize_string',
				'ew90m24' => 'sanitize_string',
				'ew90m27' => 'sanitize_string',
				'ew100m20' => 'sanitize_string',
				'ew100m21' => 'sanitize_string',
				'ew100m22' => 'sanitize_string',
				'ew100m23' => 'sanitize_string',
				'ew100m24' => 'sanitize_string',
				'ew100m27' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("process");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Production Log Book";
		$this->render_view("process/add.php");
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
		$fields = $this->fields = array("id","date","shift","grp","pink","blue","domex","easywash","fg","batch_size","manpower","man_other","wh60m10","Wh150m2","Wh150m3","Wh150m4","wh155m2","wh155m3","wh155m4","wh400m4","wh400m7","wh400m8","wh400m9","wh1000m7","wh1000m8","wh2000m7","wh2000m8","d20m17","d100m18","d250m16","d400m16","ew90m20","ew500m25","ew500m26","ew1000m25","ew1000m26","ew90m21","ew90m22","ew90m23","ew90m24","ew90m27","ew100m20","ew100m21","ew100m22","ew100m23","ew100m24","ew100m27");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'date' => 'required',
				'shift' => 'required',
				'grp' => 'required',
				'pink' => 'required',
				'blue' => 'required',
				'domex' => 'required',
				'easywash' => 'required',
				'fg' => 'required',
				'batch_size' => 'required',
				'manpower' => 'required',
				'man_other' => 'required',
				'wh60m10' => 'required|numeric',
				'Wh150m2' => 'required|numeric',
				'Wh150m3' => 'required|numeric',
				'Wh150m4' => 'required|numeric',
				'wh155m2' => 'required|numeric',
				'wh155m3' => 'required|numeric',
				'wh155m4' => 'required|numeric',
				'wh400m4' => 'required|numeric',
				'wh400m7' => 'required|numeric',
				'wh400m8' => 'required|numeric',
				'wh400m9' => 'required|numeric',
				'wh1000m7' => 'required|numeric',
				'wh1000m8' => 'required|numeric',
				'wh2000m7' => 'required|numeric',
				'wh2000m8' => 'required|numeric',
				'd20m17' => 'required|numeric',
				'd100m18' => 'required|numeric',
				'd250m16' => 'required|numeric',
				'd400m16' => 'required|numeric',
				'ew90m20' => 'required|numeric',
				'ew500m25' => 'required|numeric',
				'ew500m26' => 'required|numeric',
				'ew1000m25' => 'required|numeric',
				'ew1000m26' => 'required|numeric',
				'ew90m21' => 'required|numeric',
				'ew90m22' => 'required|numeric',
				'ew90m23' => 'required|numeric',
				'ew90m24' => 'required|numeric',
				'ew90m27' => 'required|numeric',
				'ew100m20' => 'required|numeric',
				'ew100m21' => 'required|numeric',
				'ew100m22' => 'required|numeric',
				'ew100m23' => 'required|numeric',
				'ew100m24' => 'required|numeric',
				'ew100m27' => 'required|numeric',
			);
			$this->sanitize_array = array(
				'date' => 'sanitize_string',
				'shift' => 'sanitize_string',
				'grp' => 'sanitize_string',
				'pink' => 'sanitize_string',
				'blue' => 'sanitize_string',
				'domex' => 'sanitize_string',
				'easywash' => 'sanitize_string',
				'fg' => 'sanitize_string',
				'batch_size' => 'sanitize_string',
				'manpower' => 'sanitize_string',
				'man_other' => 'sanitize_string',
				'wh60m10' => 'sanitize_string',
				'Wh150m2' => 'sanitize_string',
				'Wh150m3' => 'sanitize_string',
				'Wh150m4' => 'sanitize_string',
				'wh155m2' => 'sanitize_string',
				'wh155m3' => 'sanitize_string',
				'wh155m4' => 'sanitize_string',
				'wh400m4' => 'sanitize_string',
				'wh400m7' => 'sanitize_string',
				'wh400m8' => 'sanitize_string',
				'wh400m9' => 'sanitize_string',
				'wh1000m7' => 'sanitize_string',
				'wh1000m8' => 'sanitize_string',
				'wh2000m7' => 'sanitize_string',
				'wh2000m8' => 'sanitize_string',
				'd20m17' => 'sanitize_string',
				'd100m18' => 'sanitize_string',
				'd250m16' => 'sanitize_string',
				'd400m16' => 'sanitize_string',
				'ew90m20' => 'sanitize_string',
				'ew500m25' => 'sanitize_string',
				'ew500m26' => 'sanitize_string',
				'ew1000m25' => 'sanitize_string',
				'ew1000m26' => 'sanitize_string',
				'ew90m21' => 'sanitize_string',
				'ew90m22' => 'sanitize_string',
				'ew90m23' => 'sanitize_string',
				'ew90m24' => 'sanitize_string',
				'ew90m27' => 'sanitize_string',
				'ew100m20' => 'sanitize_string',
				'ew100m21' => 'sanitize_string',
				'ew100m22' => 'sanitize_string',
				'ew100m23' => 'sanitize_string',
				'ew100m24' => 'sanitize_string',
				'ew100m27' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("process.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("process");
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
						return	$this->redirect("process");
					}
				}
			}
		}
		$db->where("process.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Process";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("process/edit.php", $data);
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
		$fields = $this->fields = array("id","date","shift","grp","pink","blue","domex","easywash","fg","batch_size","manpower","man_other","wh60m10","Wh150m2","Wh150m3","Wh150m4","wh155m2","wh155m3","wh155m4","wh400m4","wh400m7","wh400m8","wh400m9","wh1000m7","wh1000m8","wh2000m7","wh2000m8","d20m17","d100m18","d250m16","d400m16","ew90m20","ew500m25","ew500m26","ew1000m25","ew1000m26","ew90m21","ew90m22","ew90m23","ew90m24","ew90m27","ew100m20","ew100m21","ew100m22","ew100m23","ew100m24","ew100m27");
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
				'grp' => 'required',
				'pink' => 'required',
				'blue' => 'required',
				'domex' => 'required',
				'easywash' => 'required',
				'fg' => 'required',
				'batch_size' => 'required',
				'manpower' => 'required',
				'man_other' => 'required',
				'wh60m10' => 'required|numeric',
				'Wh150m2' => 'required|numeric',
				'Wh150m3' => 'required|numeric',
				'Wh150m4' => 'required|numeric',
				'wh155m2' => 'required|numeric',
				'wh155m3' => 'required|numeric',
				'wh155m4' => 'required|numeric',
				'wh400m4' => 'required|numeric',
				'wh400m7' => 'required|numeric',
				'wh400m8' => 'required|numeric',
				'wh400m9' => 'required|numeric',
				'wh1000m7' => 'required|numeric',
				'wh1000m8' => 'required|numeric',
				'wh2000m7' => 'required|numeric',
				'wh2000m8' => 'required|numeric',
				'd20m17' => 'required|numeric',
				'd100m18' => 'required|numeric',
				'd250m16' => 'required|numeric',
				'd400m16' => 'required|numeric',
				'ew90m20' => 'required|numeric',
				'ew500m25' => 'required|numeric',
				'ew500m26' => 'required|numeric',
				'ew1000m25' => 'required|numeric',
				'ew1000m26' => 'required|numeric',
				'ew90m21' => 'required|numeric',
				'ew90m22' => 'required|numeric',
				'ew90m23' => 'required|numeric',
				'ew90m24' => 'required|numeric',
				'ew90m27' => 'required|numeric',
				'ew100m20' => 'required|numeric',
				'ew100m21' => 'required|numeric',
				'ew100m22' => 'required|numeric',
				'ew100m23' => 'required|numeric',
				'ew100m24' => 'required|numeric',
				'ew100m27' => 'required|numeric',
			);
			$this->sanitize_array = array(
				'date' => 'sanitize_string',
				'shift' => 'sanitize_string',
				'grp' => 'sanitize_string',
				'pink' => 'sanitize_string',
				'blue' => 'sanitize_string',
				'domex' => 'sanitize_string',
				'easywash' => 'sanitize_string',
				'fg' => 'sanitize_string',
				'batch_size' => 'sanitize_string',
				'manpower' => 'sanitize_string',
				'man_other' => 'sanitize_string',
				'wh60m10' => 'sanitize_string',
				'Wh150m2' => 'sanitize_string',
				'Wh150m3' => 'sanitize_string',
				'Wh150m4' => 'sanitize_string',
				'wh155m2' => 'sanitize_string',
				'wh155m3' => 'sanitize_string',
				'wh155m4' => 'sanitize_string',
				'wh400m4' => 'sanitize_string',
				'wh400m7' => 'sanitize_string',
				'wh400m8' => 'sanitize_string',
				'wh400m9' => 'sanitize_string',
				'wh1000m7' => 'sanitize_string',
				'wh1000m8' => 'sanitize_string',
				'wh2000m7' => 'sanitize_string',
				'wh2000m8' => 'sanitize_string',
				'd20m17' => 'sanitize_string',
				'd100m18' => 'sanitize_string',
				'd250m16' => 'sanitize_string',
				'd400m16' => 'sanitize_string',
				'ew90m20' => 'sanitize_string',
				'ew500m25' => 'sanitize_string',
				'ew500m26' => 'sanitize_string',
				'ew1000m25' => 'sanitize_string',
				'ew1000m26' => 'sanitize_string',
				'ew90m21' => 'sanitize_string',
				'ew90m22' => 'sanitize_string',
				'ew90m23' => 'sanitize_string',
				'ew90m24' => 'sanitize_string',
				'ew90m27' => 'sanitize_string',
				'ew100m20' => 'sanitize_string',
				'ew100m21' => 'sanitize_string',
				'ew100m22' => 'sanitize_string',
				'ew100m23' => 'sanitize_string',
				'ew100m24' => 'sanitize_string',
				'ew100m27' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("process.id", $rec_id);;
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
		$db->where("process.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("process");
	}
}
