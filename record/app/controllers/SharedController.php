<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * user_user_name_value_exist Model Action
     * @return array
     */
	function user_user_name_value_exist($val){
		$db = $this->GetModel();
		$db->where('user_name', $val);
		$exist = $db->has('user');
		return $exist;
	}

	/**
     * user_email_value_exist Model Action
     * @return array
     */
	function user_email_value_exist($val){
		$db = $this->GetModel();
		$db->where('email', $val);
		$exist = $db->has('user');
		return $exist;
	}

	/**
     * getcount_record Model Action
     * @return Value
     */
	function getcount_record(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM record";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

}
