<?php
/**
 * Page Access Control
 * @category  RBAC Helper
 */
defined('ROOT') or exit('No direct script access allowed');
class ACL
{
	

	/**
	 * Array of user roles and page access 
	 * Use "*" to grant all access right to particular user role
	 * @var array
	 */
	public static $role_pages = array(
			'administrator' =>
						array(
							'user' => array('list','view','add','edit', 'editfield','delete','import_data','accountedit','accountview'),
							'emp' => array('list','view','add','edit', 'editfield','delete'),
							'gr' => array('list','view','add','edit', 'editfield','delete'),
							'incharge' => array('list','view','add','edit', 'editfield','delete'),
							'shift' => array('list','view','add','edit', 'editfield','delete'),
							'ghk' => array('list','view','add','edit', 'editfield','delete'),
							'leader' => array('list','view','add','edit', 'editfield','delete'),
							'online' => array('list','view','add','edit', 'editfield','delete'),
							'qc' => array('list','view','add','edit', 'editfield','delete'),
							'elect' => array('list','view','add','edit', 'editfield','delete'),
							'fitter' => array('list','view','add','edit', 'editfield','delete'),
							'minor' => array('list','view','add','edit', 'editfield','delete'),
							'forklift' => array('list','view','add','edit', 'editfield','delete'),
							'psm' => array('list','view','add','edit', 'editfield','delete'),
							'wl_8mtr' => array('list','view','add','edit', 'editfield','delete'),
							'wl_feeding' => array('list','view','add','edit', 'editfield','delete'),
							'wl_11mtr' => array('list','view','add','edit', 'editfield','delete'),
							'wl_mico' => array('list','view','add','edit', 'editfield','delete'),
							'wl_subham' => array('list','view','add','edit', 'editfield','delete'),
							'wl_bagger' => array('list','view','add','edit', 'editfield','delete'),
							'dmxfeeding' => array('list','view','add','edit', 'editfield','delete'),
							'dmxbagger' => array('list','view','add','edit', 'editfield','delete'),
							'dmxhasia' => array('list','view','add','edit', 'editfield','delete'),
							'dmxsigma' => array('list','view','add','edit', 'editfield','delete'),
							'dmxsubham' => array('list','view','add','edit', 'editfield','delete'),
							'ew_boone' => array('list','view','add','edit', 'editfield','delete'),
							'ew_bosch' => array('list','view','add','edit', 'editfield','delete'),
							'ew_feeding' => array('list','view','add','edit', 'editfield','delete'),
							'ew_fg' => array('list','view','add','edit', 'editfield','delete'),
							'ew_subham' => array('list','view','add','edit', 'editfield','delete'),
							'ew_bagger' => array('list','view','add','edit', 'editfield','delete'),
							'manpower' => array('list','view','add','edit', 'editfield','delete'),
							'ew_bigbag' => array('list','view','add','edit', 'editfield','delete'),
							'process' => array('list','view','add','edit', 'editfield','delete'),
							'wastagelogs' => array('list','view','add','edit', 'editfield','delete')
						),
		
			'user' =>
						array(
							'user' => array('accountedit','accountview'),
							'emp' => array('list','view','add'),
							'incharge' => array('add'),
							'shift' => array('add'),
							'ghk' => array('add'),
							'leader' => array('add'),
							'online' => array('add'),
							'qc' => array('add'),
							'elect' => array('add'),
							'fitter' => array('add'),
							'minor' => array('add'),
							'forklift' => array('add'),
							'manpower' => array('list','view','add'),
							'process' => array('list','view','add'),
							'wastagelogs' => array('list','view','add')
						)
		);

	/**
	 * Current user role name
	 * @var string
	 */
	public static $user_role = null;

	/**
	 * pages to Exclude From Access Validation Check
	 * @var array
	 */
	public static $exclude_page_check = array("", "index", "home", "account", "info", "masterdetail");

	/**
	 * Init page properties
	 */
	public function __construct()
	{	
		if(!empty(USER_ROLE)){
			self::$user_role = USER_ROLE;
		}
	}

	/**
	 * Check page path against user role permissions
	 * if user has access return AUTHORIZED
	 * if user has NO access return UNAUTHORIZED
	 * if user has NO role return NO_ROLE
	 * @return string
	 */
	public static function GetPageAccess($path)
	{
		$rp = self::$role_pages;
		if ($rp == "*") {
			return AUTHORIZED; // Grant access to any user
		} else {
			$path = strtolower(trim($path, '/'));

			$arr_path = explode("/", $path);
			$page = strtolower($arr_path[0]);

			//If user is accessing excluded access contrl pages
			if (in_array($page, self::$exclude_page_check)) {
				return AUTHORIZED;
			}

			$user_role = strtolower(USER_ROLE); // Get user defined role from session value
			if (array_key_exists($user_role, $rp)) {
				$action = (!empty($arr_path[1]) ? $arr_path[1] : "list");
				if ($action == "index") {
					$action = "list";
				}
				//Check if user have access to all pages or user have access to all page actions
				if ($rp[$user_role] == "*" || (!empty($rp[$user_role][$page]) && $rp[$user_role][$page] == "*")) {
					return AUTHORIZED;
				} else {
					if (!empty($rp[$user_role][$page]) && in_array($action, $rp[$user_role][$page])) {
						return AUTHORIZED;
					}
				}
				return FORBIDDEN;
			} else {
				//User does not have any role.
				return NOROLE;
			}
		}
	}

	/**
	 * Check if user role has access to a page
	 * @return Bool
	 */
	public static function is_allowed($path)
	{
		return (self::GetPageAccess($path) == AUTHORIZED);
	}

}
