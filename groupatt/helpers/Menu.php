<?php
/**
 * Menu Items
 * All Project Menu
 * @category  Menu List
 */

class Menu{
	
	
			public static $navbartopleft = array(
		array(
			'path' => 'home', 
			'label' => 'Home', 
			'icon' => ''
		),
		
		array(
			'path' => 'user', 
			'label' => 'User', 
			'icon' => ''
		),
		
		array(
			'path' => 'emp', 
			'label' => 'Emp', 
			'icon' => ''
		),
		
		array(
			'path' => 'manpower', 
			'label' => 'Manpower', 
			'icon' => ''
		),
		
		array(
			'path' => 'menu5', 
			'label' => 'WHEEL', 
			'icon' => '<i class="fa fa-dot-circle-o "></i>','submenu' => array(
		array(
			'path' => 'wl_bagger', 
			'label' => 'Wl Bagger', 
			'icon' => ''
		),
		
		array(
			'path' => 'wl_mico', 
			'label' => 'Wl Mico', 
			'icon' => ''
		),
		
		array(
			'path' => 'wl_subham', 
			'label' => 'Wl Subham', 
			'icon' => ''
		),
		
		array(
			'path' => 'wl_11mtr', 
			'label' => 'Wl 11Mtr', 
			'icon' => ''
		),
		
		array(
			'path' => 'wl_feeding', 
			'label' => 'Wl Feeding', 
			'icon' => ''
		),
		
		array(
			'path' => 'wl_8mtr', 
			'label' => 'Wl 8Mtr', 
			'icon' => ''
		)
	)
		),
		
		array(
			'path' => 'menu6', 
			'label' => 'DOMEX', 
			'icon' => '<i class="fa fa-envelope-square "></i>','submenu' => array(
		array(
			'path' => 'dmxsubham', 
			'label' => 'Dmxsubham', 
			'icon' => ''
		),
		
		array(
			'path' => 'dmxsigma', 
			'label' => 'Dmxsigma', 
			'icon' => ''
		),
		
		array(
			'path' => 'dmxhasia', 
			'label' => 'Dmxhasia', 
			'icon' => ''
		),
		
		array(
			'path' => 'dmxbagger', 
			'label' => 'Dmxbagger', 
			'icon' => ''
		),
		
		array(
			'path' => 'dmxfeeding', 
			'label' => 'Dmxfeeding', 
			'icon' => ''
		)
	)
		),
		
		array(
			'path' => 'menu7', 
			'label' => 'EASY WASH', 
			'icon' => '','submenu' => array(
		array(
			'path' => 'ew_bigbag', 
			'label' => 'Ew Bigbag', 
			'icon' => ''
		),
		
		array(
			'path' => 'ew_subham', 
			'label' => 'Ew Subham', 
			'icon' => ''
		),
		
		array(
			'path' => 'ew_feeding', 
			'label' => 'Ew Feeding', 
			'icon' => ''
		),
		
		array(
			'path' => 'ew_fg', 
			'label' => 'Ew Fg', 
			'icon' => ''
		),
		
		array(
			'path' => 'ew_bosch', 
			'label' => 'Ew Bosch', 
			'icon' => ''
		),
		
		array(
			'path' => 'ew_boone', 
			'label' => 'Ew Boone', 
			'icon' => ''
		)
	)
		),
		
		array(
			'path' => 'menu8', 
			'label' => 'OTHERS', 
			'icon' => '<i class="fa fa-exclamation-triangle "></i>','submenu' => array(
		array(
			'path' => 'psm', 
			'label' => 'Psm', 
			'icon' => ''
		),
		
		array(
			'path' => 'forklift', 
			'label' => 'Forklift', 
			'icon' => ''
		),
		
		array(
			'path' => 'minor', 
			'label' => 'Minor', 
			'icon' => ''
		),
		
		array(
			'path' => 'fitter', 
			'label' => 'Fitter', 
			'icon' => ''
		),
		
		array(
			'path' => 'elect', 
			'label' => 'Elect', 
			'icon' => ''
		),
		
		array(
			'path' => 'qc', 
			'label' => 'Qc', 
			'icon' => ''
		),
		
		array(
			'path' => 'online', 
			'label' => 'Online', 
			'icon' => ''
		),
		
		array(
			'path' => 'leader', 
			'label' => 'Leader', 
			'icon' => ''
		),
		
		array(
			'path' => 'ghk', 
			'label' => 'Ghk', 
			'icon' => ''
		),
		
		array(
			'path' => 'shift', 
			'label' => 'Shift', 
			'icon' => ''
		),
		
		array(
			'path' => 'incharge', 
			'label' => 'Incharge', 
			'icon' => ''
		),
		
		array(
			'path' => 'gr', 
			'label' => 'Gr', 
			'icon' => ''
		)
	)
		),
		
		array(
			'path' => 'process', 
			'label' => 'Production Log Book', 
			'icon' => ''
		),
		
		array(
			'path' => 'wastagelogs', 
			'label' => 'Wastage logs', 
			'icon' => ''
		)
	);
		
			public static $navbartopright = array(
		array(
			'path' => 'menu1', 
			'label' => 'WHEEL', 
			'icon' => '<i class="fa fa-krw "></i>'
		),
		
		array(
			'path' => 'menu2', 
			'label' => 'DOMEX', 
			'icon' => '<i class="fa fa-building "></i>'
		),
		
		array(
			'path' => 'menu3', 
			'label' => 'EASY WASH', 
			'icon' => '<i class="fa fa-edge "></i>'
		),
		
		array(
			'path' => 'menu4', 
			'label' => 'OTHERS', 
			'icon' => '<i class="fa fa-empire "></i>'
		)
	);
		
	
	
			public static $username = array(
		array(
			"value" => "Administrator", 
			"label" => "Administrator", 
		),
		array(
			"value" => "User", 
			"label" => "User", 
		),);
		
}