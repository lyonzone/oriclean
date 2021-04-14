<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * user_username_value_exist Model Action
     * @return array
     */
	function user_username_value_exist($val){
		$db = $this->GetModel();
		$db->where("username", $val);
		$exist = $db->has("user");
		return $exist;
	}

	/**
     * user_email_value_exist Model Action
     * @return array
     */
	function user_email_value_exist($val){
		$db = $this->GetModel();
		$db->where("email", $val);
		$exist = $db->has("user");
		return $exist;
	}

	/**
     * emp_gr_option_list Model Action
     * @return array
     */
	function emp_gr_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT gr_name AS value,gr_name AS label FROM gr";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_shift_option_list Model Action
     * @return array
     */
	function emp_shift_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT shift_name AS value,shift_name AS label FROM shift";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_shift_inch1_option_list Model Action
     * @return array
     */
	function emp_shift_inch1_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT incharge_name AS value,incharge_name AS label FROM incharge";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_shift_inch2_option_list Model Action
     * @return array
     */
	function emp_shift_inch2_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT incharge_name AS value,incharge_name AS label FROM incharge";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_gr_leader_option_list Model Action
     * @return array
     */
	function emp_gr_leader_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT gr_leader AS value,gr_leader AS label FROM leader";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ghk_option_list Model Action
     * @return array
     */
	function emp_ghk_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT ghk_user AS value,ghk_user AS label FROM ghk";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_online_checker1_option_list Model Action
     * @return array
     */
	function emp_online_checker1_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_online_checker2_option_list Model Action
     * @return array
     */
	function emp_online_checker2_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_online_checker3_option_list Model Action
     * @return array
     */
	function emp_online_checker3_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_fitter_option_list Model Action
     * @return array
     */
	function emp_fitter_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_dmx_feeding_option_list Model Action
     * @return array
     */
	function emp_dmx_feeding_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_dmx_bagger_option_list Model Action
     * @return array
     */
	function emp_dmx_bagger_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_dmx_hasia_option_list Model Action
     * @return array
     */
	function emp_dmx_hasia_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_dmx_subham_option_list Model Action
     * @return array
     */
	function emp_dmx_subham_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_dmx_sigma_option_list Model Action
     * @return array
     */
	function emp_dmx_sigma_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_boone_option_list Model Action
     * @return array
     */
	function emp_ew_boone_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_bosch_option_list Model Action
     * @return array
     */
	function emp_ew_bosch_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_feeding_option_list Model Action
     * @return array
     */
	function emp_ew_feeding_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_subham_option_list Model Action
     * @return array
     */
	function emp_ew_subham_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_bagger_option_list Model Action
     * @return array
     */
	function emp_ew_bagger_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_shift_elect1_option_list Model Action
     * @return array
     */
	function emp_shift_elect1_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_qc1_option_list Model Action
     * @return array
     */
	function emp_qc1_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_qc2_option_list Model Action
     * @return array
     */
	function emp_qc2_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_shift_elect2_option_list Model Action
     * @return array
     */
	function emp_shift_elect2_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_minor1_option_list Model Action
     * @return array
     */
	function emp_minor1_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_minor2_option_list Model Action
     * @return array
     */
	function emp_minor2_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_minor3_option_list Model Action
     * @return array
     */
	function emp_minor3_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_minor5_option_list Model Action
     * @return array
     */
	function emp_minor5_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_minor6_option_list Model Action
     * @return array
     */
	function emp_minor6_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_minor7_option_list Model Action
     * @return array
     */
	function emp_minor7_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_minor8_option_list Model Action
     * @return array
     */
	function emp_minor8_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_forklift1_option_list Model Action
     * @return array
     */
	function emp_forklift1_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_forklift2_option_list Model Action
     * @return array
     */
	function emp_forklift2_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_forklift3_option_list Model Action
     * @return array
     */
	function emp_forklift3_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_feeding1_option_list Model Action
     * @return array
     */
	function emp_wl_feeding1_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_feeding2_option_list Model Action
     * @return array
     */
	function emp_wl_feeding2_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_feeding3_option_list Model Action
     * @return array
     */
	function emp_wl_feeding3_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_feeding4_option_list Model Action
     * @return array
     */
	function emp_wl_feeding4_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_feeding5_option_list Model Action
     * @return array
     */
	function emp_wl_feeding5_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_feeding6_option_list Model Action
     * @return array
     */
	function emp_wl_feeding6_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_feeding7_option_list Model Action
     * @return array
     */
	function emp_wl_feeding7_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_feeding8_option_list Model Action
     * @return array
     */
	function emp_wl_feeding8_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_8mtr1_option_list Model Action
     * @return array
     */
	function emp_wl_8mtr1_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_11mtr1_option_list Model Action
     * @return array
     */
	function emp_wl_11mtr1_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_psm1_option_list Model Action
     * @return array
     */
	function emp_wl_psm1_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_psm2_option_list Model Action
     * @return array
     */
	function emp_wl_psm2_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_8mtr2_option_list Model Action
     * @return array
     */
	function emp_wl_8mtr2_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_11mtr2_option_list Model Action
     * @return array
     */
	function emp_wl_11mtr2_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_mico2_option_list Model Action
     * @return array
     */
	function emp_wl_mico2_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_mico3_option_list Model Action
     * @return array
     */
	function emp_wl_mico3_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_mico4_option_list Model Action
     * @return array
     */
	function emp_wl_mico4_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_mico5_option_list Model Action
     * @return array
     */
	function emp_wl_mico5_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_mico6_option_list Model Action
     * @return array
     */
	function emp_wl_mico6_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_subham2_option_list Model Action
     * @return array
     */
	function emp_wl_subham2_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_subham3_option_list Model Action
     * @return array
     */
	function emp_wl_subham3_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_subham4_option_list Model Action
     * @return array
     */
	function emp_wl_subham4_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_subham1_option_list Model Action
     * @return array
     */
	function emp_wl_subham1_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_mico1_option_list Model Action
     * @return array
     */
	function emp_wl_mico1_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_bagger4_option_list Model Action
     * @return array
     */
	function emp_wl_bagger4_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_bagger2_option_list Model Action
     * @return array
     */
	function emp_wl_bagger2_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_bagger3_option_list Model Action
     * @return array
     */
	function emp_wl_bagger3_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_ws4_option_list Model Action
     * @return array
     */
	function emp_wl_ws4_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_ws3_option_list Model Action
     * @return array
     */
	function emp_wl_ws3_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_ws2_option_list Model Action
     * @return array
     */
	function emp_wl_ws2_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_ws1_option_list Model Action
     * @return array
     */
	function emp_wl_ws1_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_stacking1_option_list Model Action
     * @return array
     */
	function emp_wl_stacking1_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_stacking2_option_list Model Action
     * @return array
     */
	function emp_wl_stacking2_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_stacking3_option_list Model Action
     * @return array
     */
	function emp_wl_stacking3_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_stacking4_option_list Model Action
     * @return array
     */
	function emp_wl_stacking4_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_stacking5_option_list Model Action
     * @return array
     */
	function emp_wl_stacking5_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_stacking6_option_list Model Action
     * @return array
     */
	function emp_wl_stacking6_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_dmx_sigma1_option_list Model Action
     * @return array
     */
	function emp_dmx_sigma1_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_dmx_subham1_option_list Model Action
     * @return array
     */
	function emp_dmx_subham1_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_dmx_subham2_option_list Model Action
     * @return array
     */
	function emp_dmx_subham2_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_dmx_hasia1_option_list Model Action
     * @return array
     */
	function emp_dmx_hasia1_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_dmx_bagger1_option_list Model Action
     * @return array
     */
	function emp_dmx_bagger1_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_dmx_ws1_option_list Model Action
     * @return array
     */
	function emp_dmx_ws1_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_dmx_stacking1_option_list Model Action
     * @return array
     */
	function emp_dmx_stacking1_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_feeding1_option_list Model Action
     * @return array
     */
	function emp_ew_feeding1_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_boone1_option_list Model Action
     * @return array
     */
	function emp_ew_boone1_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_fg1_option_list Model Action
     * @return array
     */
	function emp_ew_fg1_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_fg2_option_list Model Action
     * @return array
     */
	function emp_ew_fg2_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_fg3_option_list Model Action
     * @return array
     */
	function emp_ew_fg3_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_fg4_option_list Model Action
     * @return array
     */
	function emp_ew_fg4_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_fg6_option_list Model Action
     * @return array
     */
	function emp_ew_fg6_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_fg7_option_list Model Action
     * @return array
     */
	function emp_ew_fg7_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_subham1_option_list Model Action
     * @return array
     */
	function emp_ew_subham1_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_subham2_option_list Model Action
     * @return array
     */
	function emp_ew_subham2_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_subham3_option_list Model Action
     * @return array
     */
	function emp_ew_subham3_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_subham4_option_list Model Action
     * @return array
     */
	function emp_ew_subham4_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_subham5_option_list Model Action
     * @return array
     */
	function emp_ew_subham5_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_subham6_option_list Model Action
     * @return array
     */
	function emp_ew_subham6_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_subham7_option_list Model Action
     * @return array
     */
	function emp_ew_subham7_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_bagger1_option_list Model Action
     * @return array
     */
	function emp_ew_bagger1_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_bagger2_option_list Model Action
     * @return array
     */
	function emp_ew_bagger2_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_bagger3_option_list Model Action
     * @return array
     */
	function emp_ew_bagger3_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_bagger4_option_list Model Action
     * @return array
     */
	function emp_ew_bagger4_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_bagger5_option_list Model Action
     * @return array
     */
	function emp_ew_bagger5_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_bagger6_option_list Model Action
     * @return array
     */
	function emp_ew_bagger6_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_bagger7_option_list Model Action
     * @return array
     */
	function emp_ew_bagger7_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_stacking2_option_list Model Action
     * @return array
     */
	function emp_ew_stacking2_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_stacking3_option_list Model Action
     * @return array
     */
	function emp_ew_stacking3_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_stacking4_option_list Model Action
     * @return array
     */
	function emp_ew_stacking4_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_stacking5_option_list Model Action
     * @return array
     */
	function emp_ew_stacking5_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_stacking6_option_list Model Action
     * @return array
     */
	function emp_ew_stacking6_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_stacking7_option_list Model Action
     * @return array
     */
	function emp_ew_stacking7_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_stacking8_option_list Model Action
     * @return array
     */
	function emp_ew_stacking8_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_stacking9_option_list Model Action
     * @return array
     */
	function emp_ew_stacking9_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_ws1_option_list Model Action
     * @return array
     */
	function emp_ew_ws1_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_ws2_option_list Model Action
     * @return array
     */
	function emp_ew_ws2_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_ws3_option_list Model Action
     * @return array
     */
	function emp_ew_ws3_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_ws4_option_list Model Action
     * @return array
     */
	function emp_ew_ws4_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_big1_option_list Model Action
     * @return array
     */
	function emp_ew_big1_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_big3_option_list Model Action
     * @return array
     */
	function emp_ew_big3_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_big4_option_list Model Action
     * @return array
     */
	function emp_ew_big4_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_big2_option_list Model Action
     * @return array
     */
	function emp_ew_big2_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_minor4_option_list Model Action
     * @return array
     */
	function emp_minor4_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_bagger1_option_list Model Action
     * @return array
     */
	function emp_wl_bagger1_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_dmx_feeding1_option_list Model Action
     * @return array
     */
	function emp_dmx_feeding1_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_dmx_stacking2_option_list Model Action
     * @return array
     */
	function emp_dmx_stacking2_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_dmx_ws2_option_list Model Action
     * @return array
     */
	function emp_dmx_ws2_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_bosch1_option_list Model Action
     * @return array
     */
	function emp_ew_bosch1_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_bosch2_option_list Model Action
     * @return array
     */
	function emp_ew_bosch2_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_stacking1_option_list Model Action
     * @return array
     */
	function emp_ew_stacking1_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_ew_stacking10_option_list Model Action
     * @return array
     */
	function emp_ew_stacking10_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_olc_option_list Model Action
     * @return array
     */
	function emp_olc_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_warehouse_option_list Model Action
     * @return array
     */
	function emp_warehouse_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_bag_coding_option_list Model Action
     * @return array
     */
	function emp_bag_coding_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_store_incharge_option_list Model Action
     * @return array
     */
	function emp_store_incharge_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wt_variation_checker_option_list Model Action
     * @return array
     */
	function emp_wt_variation_checker_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_bagger6_option_list Model Action
     * @return array
     */
	function emp_wl_bagger6_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_ws6_option_list Model Action
     * @return array
     */
	function emp_wl_ws6_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_bagger5_option_list Model Action
     * @return array
     */
	function emp_wl_bagger5_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_ws5_option_list Model Action
     * @return array
     */
	function emp_wl_ws5_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_subhambagger4t_option_list Model Action
     * @return array
     */
	function emp_wl_subhambagger4t_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * emp_wl_subhambagger5t_option_list Model Action
     * @return array
     */
	function emp_wl_subhambagger5t_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT employee_name AS value,employee_name AS label FROM manpower";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * qc_qc_incharge_option_list Model Action
     * @return array
     */
	function qc_qc_incharge_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT qc_incharge AS value,qc_incharge AS label FROM qc";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * process_grp_option_list Model Action
     * @return array
     */
	function process_grp_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT gr_name AS value,gr_name AS label FROM gr";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * process_date_option_list Model Action
     * @return array
     */
	function process_date_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT date AS value , date AS label FROM wastagelogs ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * process_shift_option_list Model Action
     * @return array
     */
	function process_shift_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT shift_name AS value,shift_name AS label FROM shift";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

}
